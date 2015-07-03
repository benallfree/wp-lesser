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
          'title'     => 'Public Pages',
          'page_slug' => 'lesser_front_end_page'
      ),
      array(
          'title'     => 'Admin Pages',
          'page_slug' => 'lesser_admin_page'
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
  
  function addForm($mode, $title, $description, $default)
  {
    $this->addSettingFields(
      array(    // Text Area
          'field_id'      => 'lesser_'.$mode.'_less',
          'type'          => 'textarea',
          'title'         => $title,
          'description'   => $description,
          'default'       => '/* LESS goes here - visit lesscss.org for details */',
      ),   
      array( // Submit button
          'field_id'      => 'submit_button',
          'type'          => 'submit',
      )   
    );   
  }
  
  function processSubmit($mode)
  {
    $data = get_option('Lesser_APF');
    $less = $data['lesser_'.$mode.'_less'];

    $parser = new Less_Parser();
    $parser->parse( $less );
    $css = $parser->getCss();
    
    $data['lesser_'.$mode.'_css'] = $css;
    
    $data = apply_filters('lesser_before_'.$mode.'_save', $data);
    
    update_option('Lesser_APF', $data);
  }

  public function load_lesser_admin_page( $oAdminPage ) 
  {
    $this->addForm('admin', 'Admin LESS', 'This LESS will be served only to WordPress admin pages.' );
  }
      

  function submit_after_Lesser_APF_lesser_admin_page()
  {
    $this->processSubmit('admin');
  }  
  
  public function load_lesser_common_page( $oAdminPage ) 
  {
    $this->addForm('common', 'Common LESS', 'This LESS will be served to both the frontend pages and WordPress admin pages.');
  }
  
  function submit_after_Lesser_APF_lesser_common_page()
  {
    $this->processSubmit('common');
  }  
  
  public function load_lesser_front_end_page( $oAdminPage ) 
  {
    $this->addForm('frontend', 'Public Pages LESS', 'This LESS will only be served to front-end public pages (i.e., the pages your visitors see)');
  }
  
  function submit_after_Lesser_APF_lesser_front_end_page()
  {
    $this->processSubmit('frontend');
  }
  
}
if(is_admin())
{
  new Lesser_APF();
}
