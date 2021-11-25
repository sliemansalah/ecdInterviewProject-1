<?php
$fileName= "http://localhost/ecdInterviewProject-1/combination_count.csv";
$lines = file($fileName);
$headers = array();
$dataObjects = array();

foreach ($lines as $index => $line)
{
    if ($index === 0)
    {
        # this is the header line
        $headers = str_getcsv($line);
    }
    else
    {
        $data = str_getcsv($line);
        $obj = new stdClass();
        foreach ($headers as $index => $header)
        {
            $temp= $data;
            $data[1]= str_replace(' 16gb', '', $temp[1]);
            $data[2]= $temp[5];
            $data[3]= $temp[4];
            $data[4]= $temp[6];
            $data[5]= $temp[3];
            $data[6]= $temp[2];
            $obj->$header = $data[$index];
        }

        $dataObjects[] = $obj;
    }
}

print json_encode($dataObjects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    
?>