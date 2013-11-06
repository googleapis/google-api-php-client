<?php
/*
 * Copyright 2011 Google Inc.
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
 * This class defines attributes, valid values, and usage which is generated         
 * from a given json schema.
 * http://tools.ietf.org/html/draft-zyp-json-schema-03#section-5
 *
 * @author Chirag Shah <chirags@google.com>
 *
 */
class Google_Model implements ArrayAccess
{
  protected $data;
  protected $processed = array();

  /**
   * Polymorphic - accepts a variable number of arguments dependent
   * on the type of the model subclass.
   */
  public function __construct()
  {
    if (func_num_args() ==  1 && is_array(func_get_arg(0))) {
      // Initialize the model with the array's contents.
      $array = func_get_arg(0);
      $this->mapTypes($array);
    }
  }

  public function __get($key)
  {
    $keyTypeName = $this->keyType($key);
    $keyDataType = $this->dataType($key);
    if (isset($this->$keyTypeName) && !isset($this->processed[$key])) {
      $val = $this->data[$key];
      if ($this->isAssociativeArray($val)) {
        if (isset($this->$keyDataType) && 'map' == $this->$keyDataType) {
          foreach ($val as $arrayKey => $arrayItem) {
              $this->data[$key][$arrayKey] =
                $this->createObjectFromName($keyTypeName, $arrayItem);
          }
        } else {
          $this->data[$key] = $this->createObjectFromName($keyTypeName, $val);
        }
      } else if (is_array($val)) {
        $arrayObject = array();
        foreach ($val as $arrayIndex => $arrayItem) {
          $arrayObject[$arrayIndex] =
            $this->createObjectFromName($keyTypeName, $arrayItem);
        }
        $this->data[$key] = $arrayObject;
      }
      $this->processed[$key] = true;
    }

    return $this->data[$key];
  }

  /**
   * Initialize this object's properties from an array.
   *
   * @param array $array Used to seed this object's properties.
   * @return void
   */
  protected function mapTypes($array)
  {
    // Hard initilise simple types, lazy load more complex ones.
    foreach ($array as $key => $val) {
      if ( !property_exists($this, $this->keyType($key)) &&
        property_exists($this, $key)) {
          $this->$key = $val;
          unset($array[$key]);
      }
    }
    $this->data = $array;
  }

  /**
   * Returns true only if the array is associative.
   * @param array $array
   * @return bool True if the array is associative.
   */
  protected function isAssociativeArray($array)
  {
    if (!is_array($array)) {
      return false;
    }
    $keys = array_keys($array);
    foreach ($keys as $key) {
      if (is_string($key)) {
        return true;
      }
    }
    return false;
  }

  /**
   * Given a variable name, discover its type.
   *
   * @param $name
   * @param $item
   * @return object The object from the item.
   */
  private function createObjectFromName($name, $item)
  {
    $type = $this->$name;
    return new $type($item);
  }

  /**
   * Verify if $obj is an array.
   * @throws Google_Exception Thrown if $obj isn't an array.
   * @param array $obj Items that should be validated.
   * @param string $method Method expecting an array as an argument.
   */
  public function assertIsArray($obj, $method)
  {
    if ($obj && !is_array($obj)) {
      throw new Google_Exception(
          "Incorrect parameter type passed to $method(),"
          . " expected an array."
      );
    }
  }

  public function offsetExists($offset)
  {
    return isset($this->$offset) || isset($this->data[$offset]);
  }

  public function offsetGet($offset)
  {
    return isset($this->$offset) ?
        $this->$offset :
        $this->__get($offset);
  }

  public function offsetSet($offset, $value)
  {
    if (property_exists($this, $offset)) {
      $this->$offset = $value;
    } else {
      $this->data[$offset] = $value;
      $this->processed[$offset] = true;
    }
  }

  public function offsetUnset($offset)
  {
    unset($this->data[$offset]);
  }

  protected function keyType($key)
  {
    return $key . "Type";
  }

  protected function dataType($key)
  {
    return $key . "DataType";
  }
}
