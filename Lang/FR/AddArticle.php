

        <div class="wrapper">

        <?php
         
            $query = "SELECT * FROM `Langues`";
            $stmt = $dbPdo->query($query);
            $result = $stmt->fetchAll();



            ?>



                <?php include 'NAVBAR.php'; ?>

                <div id="MailleAdmin"></div>

                <div class="HexagonGroupAdmin">
                    <div id="hexagonProject1"></div>
                    <div id="hexagonProject1-1"></div>
                    <h2 id="hexagonProject1-title">Edition Nouvel Article</h2>
                </div>

                <a id="Return" href="Admin.php">Retour</a>

                <form id="Edition" action="Files/Article/Article_Add.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="title" placeholder="Titre">
                    <textarea name="chapo" class="chapo" placeholder="Châpo..."></textarea>
                    <label for="NbrParagraphe">Nombre de paragraphe</label>
                    <input type="number" id="NbrPara" name="NbrPara" min="1" max="5" onchange="NbrParagraphe()" value="1">
                    <textarea class="paragraphe" placeholder="Paragraphe..."></textarea>
                    <select type="text" name="NumLang" placeholder="Langues" id="Here">

                        <?php foreach($result as $key => $value){  ?>
                            <option value="<?php  echo($value[0]);   ?>"><?php echo($value[1]); ?></option>
                        <?php  } ?>

                    </select>
                    <!-- <input type="date" name="date"> -->
                    <!-- <input type="file" name="image" id="image" /> -->
                    <input type="submit" name="Envoie" value="VALIDER">
                </form>

        </div>
        <br><br><br>

    </body>

    <script>

            // Execute 1 time to display the first textarea
            NbrParagraphe();

            function NbrParagraphe(){

                var Nbr = document.getElementById("NbrPara").value;
                var NewDiv = document.getElementsByClassName("paragraphe");

                // Allow to delete element
                Element.prototype.remove = function() {
                    this.parentElement.removeChild(this);
                }
                NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
                    for(var i = this.length - 1; i >= 0; i--) {
                        if(this[i] && this[i].parentElement) {
                            this[i].parentElement.removeChild(this[i]);
                        }
                    }
                }

                // Delete all div with ClassName "Para"
                document.getElementsByClassName("paragraphe").remove();
                
               
               for (let index = 0; index < Nbr;  index++) {
                   
                    var ActualPara = index + 1;
                    var here = document.getElementById("Here");

                    if(ActualPara == 1){
                        here.insertAdjacentHTML('beforebegin',
                                 '<textarea class="paragraphe" placeholder="Paragraphe..." name="Paragraphe1"></textarea>');
                    }
                    else if(ActualPara > 1){
                        here.insertAdjacentHTML('beforebegin',
                                '<input class="paragraphe" name="Subtitle' + ActualPara + 
                                '" type="text" placeholder="Sous-Titre ' + ActualPara + 
                                '" required> <br class="paragraphe" /><textarea class="paragraphe" type="text" name="Paragraphe'
                                + ActualPara + '" placeholder="Paragraphe ' + ActualPara + '..." required></textarea><br class="paragraphe" />');
                        }
                }
            }


           

        </script>

         <script>  
         $(document).ready(function(){  
              $('#insert').click(function(){  
                   var image_name = $('#image').val();  
                   if(image_name == '')  
                   {  
                        alert("Please Select Image");  
                        return false;  
                   }  
                   else  
                   {  
                        var extension = $('#image').val().split('.').pop().toLowerCase();  
                        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                        {  
                             alert('Invalid Image File');
                             $('#image').val('');  
                             return false;  
                        }  
                   }  
              });  
         });  
         </script>  

</html>