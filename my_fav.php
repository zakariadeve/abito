<?php
            if(isset($_SESSION['idu'])){                

        ?>
        <table>

            <?php $idu=$_SESSION['idu'];
                $req_pro=mysqli_query($conn,"select * from favori,produit 
                               where favori.idu=$idu and favori.idp=produit.idp");
                while($data_pro=mysqli_fetch_assoc($req_pro)){ ?>
            <tr>
                <td><?php echo $data_pro['titrep'] ?></td>
                <td><img src="<?php echo $data_pro['ph1'] ?>"></td>
                <td><?php echo $data_pro['prix'] ?> DH</td>
                <td><a href="delete_product.php?idf=<?php echo $data_pro['idf'] ?>">delete</a></td>
            </tr>
            <?php } ?>

        </table>
        <?php  }else{
            echo"<script>window.location.href='login.php'</script>";

         }  ?>