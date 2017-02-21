<?php
include 'inc/header.php';
include 'inc/sidebar.php';

//include 'inc/content.php';
?>

<?php
 $post = new Post();
 $fm = new Format();
?>

<!--pagination-->
<?php
$perPage=1;

if(!isset($_GET['category']) || $_GET['category']==NULL){
header("Location:404.php");

}else{
  $category=$_GET['category'];
}


?>



<!--pagination-->

<div class="col-sm-9 animated  slideInRight">
<h2 class="v-center well">POST STORE</h2>
<div class="min-height well">
<div class="row">
<?php
$getPost= $post->getPostByCategory($category);
if($getPost){
$i=0;
while($result=$getPost->fetch_assoc()){
$i++;
?>
<div class="col-md-12 single-post">
    <div class="thumbnail">
    
     
      <div class="caption">
         <h4 class="btn btn-success" style="margin-left: 10px;"><i class="fa fa-tag" ></i>&nbsp;<?php echo $result['tags'];?></h4>

        <p class=" thum-height " style="text-align:justify; padding: 10px;">

         <strong style="font-size: 25px;color:white; display:block; margin-bottom:15px; " class="btn btn-primary"><?php echo $result['title'];?></strong>

          <img src="../admin/<?php echo $result['image'];?>" style="margin-top:-15px;" alt="..." class="pull-right col-sm-4" width="200px;">


         <?php echo $fm->textShorten($result['body']);?>
          <a href="post-details.php?id=<?php echo $result['id'];?>" class="btn btn-info pull-right" >Read More..</a>

     
          
         
              <hr>
               
          <br></br>





        </p>
        
        
        <p><button class="btn btn-primary" style="margin-left: 10px;" role="button"><i class=""></i><?php echo $fm->formDate($result['date']);?></Button>


        <a href="index.php" class="btn btn-info pull-right" >BACK</a>&nbsp;&nbsp;&nbsp;


        <a href="#" class="btn btn-primary pull-right" title="AUTHOR" role="button">By&nbsp;<i class="fa fa-user"></i><?php echo $result['author'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <label class="new animated infinite jello pull-right">NEW</label>
      </div>
    </div>


</div>

<h3>Please signup and login to comments</h3>
<h4>Before logout , please logout from comment, at right corner.</h4>


<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//md-easir-arafat.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



<?php

} //--end while loop--

?>


<?php

}else{
  echo "<font class=\"btn btn-info\">There is no category such type</font>";
  //header("Location:404.php");
}
?>
</div>
</div><!--col-sm-9-end -->
</div><!--row-end -->
</div><!--container-end -->
</section><!--4th-row-end -->

<?php include 'inc/footer.php' ;?>
