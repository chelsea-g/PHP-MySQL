<?php 

    require_once("StudentManager.php");
    
    echo "Add a new student to the SOMETHING database...<br/>";
    
    //create studentmanager object
    $manager = new StudentManager();
    
    //CREATE
    $manager->create('Chelsea','greger@gmail.com');
    
    
    //DELETE
    $id = $manager->create('DELETE ME!', 'deleteme@blah.edu');
    
    echo "And the id is: $id<br/>";
    
    $rowsDeleted = $manager->delete($id);
    
    echo "deleted number of rows";
    
    
    //UPDATE ALL
    $idBuckaroo = $manager->create('buckaroo', 'bucky@wi.com');
    
    $rowsUpdated = $manager->updateAll($idBuckaroo, 'buckaroo', 'bucky@badgers.com');
    
    echo "Updated number of rows: $rowsUpdated<br/>";

?>