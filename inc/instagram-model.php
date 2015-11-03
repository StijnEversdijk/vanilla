<?php

error_reporting(0);

$response = file_get_contents("https://api.instagram.com/v1/users/316201136/media/recent?access_token=XXXXXXX&count=50");

$valid = false;

if ($response)
{
  $json = json_decode($response);

  if ($json)
  {
    try
    {
      $data = $json->{"data"};

      $filtered_json = clone $json;
      $filtered_data = array( count($data) );

      for ($i = 0; $i < count($data); $i++)
      {
        $f = array(
            "link" => $data[$i]->{"link"},
            "images" => $data[$i]->{"images"}
          );

        $filtered_data[$i] = $f;
      }

      $filtered_json->{"data"} = $filtered_data;

      $valid = true;

      header("Content-type: application/json");
      header("Cache-Control: max-age=60, public");
      echo json_encode($filtered_json);
    }
    catch (Exception $e)
    {
      // something went wrong. ignore.
    }
  }
}

if (!$valid)
{
  header("HTTP/1.0 500 Internal Server Error");
  header('Content-type: application/json');
  header("Cache-Control: max-age=60, public");
  echo "{}";
}
