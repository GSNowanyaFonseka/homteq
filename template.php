// create the template for the web application by bringing together the header and navigation layout, the footer layout and the external style sheets

<?php
// create a variable called $pagename
$pagename="template";

// call in stylesheet
echo "<title>".$pagename."<title>";

echo "<body>";

// include header layout file
include {"headerfile.html"};

// display name of the page on the web page
echo "<h4>".$pagename."</h4>";

// display random text
echo "<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
labore et dolore magna aliqua. Non consectetur a erat nam at lectus urna. Cras pulvinar mattis nunc sed
blandit libero volutpat sed cras. Nunc aliquet bibendum enim facilisis gravida neque convallis a cras.
Nunc consequat interdum varius sit. Nam aliquam sem et tortor consequat. Magna sit amet purus gravida. Non
sodales neque sodales ut etiam sit. Tortor consequat id porta nibh venenatis. Ornare arcu odio ut sem
nulla pharetra diam. Tincidunt ornare massa eget egestas purus. Pulvinar mattis nunc sed blandit libero
volutpat sed. Nulla malesuada pellentesque elit eget. Varius quam quisque id diam vel quam elementum
pulvinar. Aliquet eget sit amet tellus cras adipiscing enim eu turpis. Vestibulum lectus mauris ultrices
eros in. Faucibus in ornare quam viverra. Hac habitasse platea dictumst vestibulum rhoncus. Parturient
montes nascetur ridiculus mus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis urna." ;

// include head layout
include {"footer.html"};

echo "</body>";
?>