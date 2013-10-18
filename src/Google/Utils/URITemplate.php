<?php
/*
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Implementation of levels 1-3 of the URI Template spec. 
 * @see http://tools.ietf.org/html/rfc6570
 */
class Google_Utils_URITemplate
{
  /**
   * @var $operators array 
   * These are valid at the start of a template block to
   * modify the way in which the variables inside are
   * processed.
   */
  private $operators = array(
      "+" => "reserved",
      "/" => "segments",
      "." => "dotprefix",
      "#" => "fragment",
      ";" => "semicolon",
      "?" => "form",
      "&" => "continuation"
  );

  /**
   * @var reserved array
   * These are the characters which should not be URL encoded in reserved
   * strings.
   */
  private $reserved = array(
      "=", ",", "!", "@", "|", ":", "/", "?", "#",
      "[", "]","$", "&", "'", "(", ")", "*", "+", ";"
  );
  private $reservedEncoded = array(
    "%3D", "%2C", "%21", "%40", "%7C", "%3A", "%2F", "%3F",
    "%23", "%5B", "%5D", "%24", "%26", "%27", "%28", "%29",
    "%2A", "%2B", "%3B"
  );

  public function parse($string, array $parameters)
  {
    return $this->resolveNextSection($string, $parameters);
  }

  /**
   * This function finds the first matching {...} block and
   * executes the replacement. It then calls itself to find
   * subsequent blocks, if any. 
   */
  private function resolveNextSection($string, $parameters)
  {
    $start = strpos($string, "{");
    if ($start === false) {
      return $string;
    }
    $end = strpos($string, "}");
    if ($end === false) {
      return $string;
    }
    $string = $this->replace($string, $start, $end, $parameters);
    return $this->resolveNextSection($string, $parameters);
  }

  private function replace($string, $start, $end, $parameters)
  {
    // We know a data block will have {} round it, so we can strip that.
    $data = substr($string, $start + 1, $end - $start - 1);

    // If the first character is one of the reserved operators, it effects
    // the processing of the stream.
    if (isset($this->operators[$data[0]])) {
      $op = $this->operators[$data[0]];
      $data = substr($data, 1);
      switch ($op) {
        case "reserved":
          // Reserved means certain characters should not be URL encoded
          $data = $this->replaceVars($data, $parameters, ",", null, true);
          break;
        case "fragment":
          // Comma separated with fragment prefix. Bare values only.
          $data = "#" . $this->replaceVars($data, $parameters, ",", null, true);
          break;
        case "segments":
          // Slash separated data. Bare values only.
          $data = "/" . $this->replaceVars($data, $parameters, "/");
          break;
        case "dotprefix":
          // Dot separated data. Bare values only.
          $data = "." . $this->replaceVars($data, $parameters, ".");
          break;
        case "semicolon":
          // Semicolon prefixed and separated. Uses the key name
          $data = ";" . $this->replaceVars($data, $parameters, ";", "=", false, true);
          break;
        case "form":
          // Standard URL format. Uses the key name
          $data = "?" . $this->replaceVars($data, $parameters, "&", "=");
          break;
        case "continuation":
          // Standard URL, but with leading ampersand. Uses key name.
          $data = "&" . $this->replaceVars($data, $parameters, "&", "=");
          break;
      }
    } else {
      // If no operator we replace with the defaults.
      $data = $this->replaceVars($data, $parameters);
    }
    // This is chops out the {...} and replaces with the new section.
    return substr($string, 0, $start) . $data . substr($string, $end + 1);
  }

  private function replaceVars(
      $section,
      $parameters,
      $sep = ",",
      $combine = null,
      $reserved = false,
      $tag_empty = false
  ) {
    if (strpos($section, ",") === false) {
      // If we only have a single value, we can immediately process.
      return $this->combine($section, $parameters, $combine, $reserved, $tag_empty);
    } else {
      // If we have multiple values, we need to split and loop over them.
      // Each is treated individually, then glued together with the
      // separator character.
      $vars = explode(",", $section);
      $ret = array();
      foreach ($vars as $var) {
        $ret[] = $this->combine($var, $parameters, $combine, $reserved, $tag_empty);
      }
      return implode($sep, $ret);
    }
  }

  public function combine($key, $parameters, $combine, $reserved, $tag_empty)
  {
    if (!empty($parameters[$key])) {
      // For an individual value, we need to URL encode the data.
      $value = rawurlencode($parameters[$key]);
    } else if ($tag_empty) {
      // If we are just indicating empty values with their key name, return that.
      return $key;
    } else {
      // Otherwise we can return empty string.
      $value = "";
    }
    if ($reserved) {
      $value = str_replace($this->reservedEncoded, $this->reserved, $value);
    }
    // If we do not need to include the key name, we just return the raw
    // value.
    if (!$combine) {
      return $value;
    }
    // Else we combine the key name: foo=bar
    return $key . $combine . $value;
  }
}
