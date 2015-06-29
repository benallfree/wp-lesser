<?php
  
class Lesser_APF extends LesserAdminPageFramework {
  public function setUp()
  {
    // Create the root menu - specifies to which parent menu to add.
    $this->setRootMenuPage( apply_filters('lesser_name', 'Lesser') );  

    $items = array(
      array(
          'title'     => 'Instructions',
          'page_slug' => 'lesser_instructions_page'
      ),
      array(
          'title'     => 'Common',
          'page_slug' => 'lesser_common_page'
      ),
      array(
          'title'     => 'Front End',
          'page_slug' => 'lesser_front_end_page'
      ),
      array(
          'title'     => 'Back End',
          'page_slug' => 'lesser_back_end_page'
      ),
    );
    
    $items = apply_filters('lesser_menu_setup_items', $items);
    
    foreach($items as $item)
    {
      $this->addSubMenuItems($item);
    }
  }

  public function do_lesser_instructions_page() {   
    ?>
    <h3>Instructions</h3>
    <p>This is inserted by the 'do_' + page slug method.</p>
    <?php 
  }
  
  public function do_lesser_common_page() {   
    ?>
    <h3>Instructions</h3>
    <p>This is inserted by the 'do_' + page slug method.</p>
    <?php 
  }

  public function do_lesser_front_end_page() {   
    ?>
    <h3>Front End</h3>
    <p>This is inserted by the 'do_' + page slug method.</p>
    <?php 
  }
  
  public function load_lesser_front_end_page( $oAdminPage ) 
  {
    die('hi');
    $this->addSettingFields(
      array(    // Text Area
          'field_id'      => 'lesser_frontend',
          'type'          => 'textarea',
          'title'         => 'Front End LESS',
          'description'   => 'This LESS will only be served to front-end pages (i.e., the pages your visitors see)',
          'default'       => 'body { background-color: red; }',
      ),   
      array( // Submit button
          'field_id'      => 'submit_button',
          'type'          => 'submit',
      )   
    );   
  }
}
if(is_admin())
{
  new Lesser_APF();
}
