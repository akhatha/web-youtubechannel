<video width="400" id="scream" src="localhost/vizzdeo.com/public/uploads/video/2017-10-01-07-49-48.mp4" controls>
   
</video>
    
<p>Canvas:</p>
<canvas id="myCanvas" width="400" style="border:1px solid #d3d3d3;">
    Your browser does not support the HTML5 canvas tag.
</canvas>


<script>
    alert("hi");
window.onload = function() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
    ctx.drawImage(img, 0, 0, 400, 225);
}
<script>