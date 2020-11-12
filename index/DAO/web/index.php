
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud-php</title>
</head>
<body>
<form method="POST" action="insertion.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="First">typeP :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre  typeP" id="First" name="typeP" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="Last">descriptionP :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre  descriptionP" id="Last" name="descriptionP" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="environnementP">environnementP :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre environnementP" id="environnementP" name="environnementP" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="titreP">titreP :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre titreP" id="titreP" name="titreP" value="" />
                  </td>
               </tr>              
               <tr>
                  <td align="right">
                     <label for="NHeuresP">NHeuresP :</label>
                  </td>
                  <td>
                     <input type="number" placeholder=" NHeuresP" id="NHeuresP" name="NHeuresP" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="J'ajoute" />
                  </td>
               </tr>
            </table>
         </form>
</body>
</html>