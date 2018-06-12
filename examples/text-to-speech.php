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

include_once __DIR__ . '/../vendor/autoload.php';
include_once "templates/base.php";

/************************************************
  We create the client and set the simple API
  access key. If you comment out the call to
  setDeveloperKey, the request may still succeed
  using the anonymous quota.
 ************************************************/
$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");

// Warn if the API key isn't set.
if (!$apiKey = getApiKey()) {
  echo missingApiKeyWarning();
  return;
}
$client->setDeveloperKey($apiKey);

$service = new Google_Service_Texttospeech($client);

if (isset($_REQUEST['inputText'])) {

	$inputText = $_POST['inputText'];
	unset($_POST['inputText']);
	$name = array_keys($_POST)[0];
	$req = new Google_Service_Texttospeech_SynthesizeSpeechRequest(
		['audioConfig' => ['audioEncoding' => 'OGG_OPUS']
		,'voice'       => ['name' => $name, 'languageCode' => substr($name, 0, 5)]
		,'input'       => ['text' => $inputText, /*'ssml' => '<speak>$inputText</speak>'*/]
	]);
	
	$results = $service->text->synthesize($req);
	
	$src = "data:audio/ogg;base64," . $results->audioContent;
	$audio = "<audio controls src=\"$src\">";
}

$languages = 
	["nl" => ["Dutch"     , ["NL"=> ["Netherlands"]]]
	,"en" => ["English"   , ["AU"=> ["Australia"], "GB"=> ["UK"], "US"=> ["United States of America"]]]
	,"fr" => ["French"    , ["FR"=> ["France"], "CA"=> ["Canada"]]]
	,"de" => ["German"    , ["DE"=> [""]]]
	,"it" => ["Italian"   , ["IT"=> [""]]]
	,"ja" => ["Japanese"  , ["JP"=> [""]]]
	,"ko" => ["Korean"    , ["KR"=> [""]]]
	,"pt" => ["Portugese" , ["BR"=> ["Brazil"]]]
	,"es" => ["Spanish"   , ["ES"=> [""]]]
	,"sv" => ["Swedish"   , ["SE"=> [""]]]
	,"tr" => ["Turkish"   , ["TR"=> [""]]]
];
$newLanguages = [];
$newVoices = [];
$stdFemale = ['nl'=>1, 'it'=>1, 'ja'=>1, 'ko'=>1, 'pt'=>1, 'es'=>1, 'sv'=>1, 'tr'=>1];

/************************************************
  We can know when new languages and variants 
  are available by comparing the results of this
  call with the list of languages above.
 ************************************************/
$results = $service->voices->listVoices();
foreach ($results as $voice) {
	$i ++;
	list($lang, $country) = explode("-", $voice->languageCodes[0]);

	if ($languages[$lang] && $languages[$lang][1][$country]) {
		if ($voice->ssmlGender == "FEMALE" && $stdFemale[$lang]) {
			$stdFemale[$lang] = $voice->name;
		} else {
			$wavenet = strpos($voice->name, "Wavenet") > 5 ? "Wavenet - ": "";
			$languages[$lang][1][$country][] = submitButton($voice->name, $wavenet . ucfirst(strtolower($voice->ssmlGender)));
		}

		if (
			$stdFemale[$lang] &&
			($voice->ssmlGender != "FEMALE" || strpos($voice->name, "Wavenet") > 5)
		) {
			$newVoices[] = $voice->name;
		}

	} else {
		$newLanguages[] = $voice->name;
	}
}

if (!$inputText) {
	$inputText = "Google Cloud Text-to-Speech enables developers to synthesize natural-sounding
speech with $i voices, available in multiple languages and variants. It applies DeepMind’s
groundbreaking research in WaveNet and Google’s powerful neural networks to deliver the
highest fidelity possible. As an easy-to-use API, you can create lifelike interactions
with your users, across many applications and devices.";
}

echo pageHeader("Cloud Text-to-Speech");
?>

<form id="url" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<p>Text to Synthesize:</p>
<textarea name="inputText" style="width:740px;height:96px"><?=$inputText?></textarea>
<div><?=$audio?></div>

<?php foreach ($stdFemale as $k=>$v):?>
	<?=submitButton($v,$languages[$k][0])?>
<?php endforeach ?>

<?php foreach ($languages as $k => list($name, $countries)) {
	if (!$stdFemale[$k]) { ?>
		<h4><?=$name?></h4>
		<?php foreach ($countries as $c) {
			$name = array_shift($c)?>
			<h5><?=$name?></h5>
			<?php foreach ($c as $button) { ?>
				<?=$button?> <?php
			}
		}
	}
}
?>
</form>

<?php if (count($newLanguages) > 0): ?>
	<h3>New Languages or Countries!!!</h3>
	<?php foreach ($newLanguages as $item): ?>
	  <?= $item ?><br>
	<?php endforeach ?>
<?php endif ?>

<?php if (count($newVoices) > 0): ?>
	<h3>New (Male) Voices:</h3>
	<?php foreach ($newVoices as $item): ?>
	  <?= $item ?><br>
	<?php endforeach ?>
<?php endif ?>

<?= pageFooter(__FILE__) ?>
