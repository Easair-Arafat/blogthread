
      
    


  $getCat= $cat->getAllCat();

  if($getCat){
  $i=0;
  
  while($result = $getCat->fetch_assoc() ){


  
  $i++;

  while($i<=10){
   	?>

  <tr class="info">
  <td><?php echo  $i;  ?></td>
  <td><?php echo $result['catName'];?></td>
  <td><a href="#">Delete</a> || <a href="#">Edit</a></td>
  </tr>
  <?php break;}
}
}

}






    ?>
     
    	



    </tbody>
    </table>
_
     </div><!--row-end -->
      
      </div><!--end of min-height-->
      </div><!--col-sm-9-end -->
      </div><!--row-end -->
      </div><!--container-end -->
      </section><!--4th-row-end -->









<?php
include 'inc/footer.php';
?>
