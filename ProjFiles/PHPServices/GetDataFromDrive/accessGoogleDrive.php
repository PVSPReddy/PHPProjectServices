<?php
//$path = 'https://googledrive.com/host/0B3QDCSiWGzrIUzl3eW1DWnUyT28';
//https://drive.google.com/uc?export=download&id=$id&confirm=$confirm
//<iframe src="https://drive.google.com/embeddedfolderview?id=FOLDER-ID#list" style="width:100%; height:600px; border:0;"></iframe>

//my drive folder = https://drive.google.com/open?id=1wde0M43d4Fg6-To6hOt0TOCs1D2My2Wm
//
//MSuGdmp0nITGr5eH3lVX998SsvhU8fKc_
// $path = 'https://drive.google.com/uc?export=download&id=1wde0M43d4Fg6-To6hOt0TOCs1D2My2Wm&confirm=true';
// $path = 'https://drive.google.com/open?id=1wde0M43d4Fg6-To6hOt0TOCs1D2My2Wm';
$path = 'https://drive.google.com/embeddedfolderview?id=1wde0M43d4Fg6-To6hOt0TOCs1D2My2Wm#list';
// $path = 'images';
echo $path;
$files = scandir($path);
$ignore = array( 'cgi-bin', '.', '..');

# removing ignored files
$files = array_filter($files, function($file) use ($ignore) {return !in_array($file, $ignore);});

# getting the modification time for each file
$times = array_map(function($file) use ($path) {return filemtime("$path/$file");}, $files);

# sort the times array while sorting the files array as well
array_multisort($times, SORT_DESC, SORT_NUMERIC, $files);
foreach ($files as $file) 
{
    $href = $path."/".$file;
    echo '<div class="item">';
    echo '<a title="&copy;2013 ThemGrunts" rel="gallery" class="fancybox" href="'.$href.'"><img src="'.$href.'" alt="'.$image.'" /></a>';
    echo '</div>';
}
?>