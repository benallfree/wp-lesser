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
          'title'     => 'LESS',
          'page_slug' => 'lesser_common_page'
      ),
    );
    
    $items = apply_filters('lesser_menu_setup_items', $items);
    
    foreach($items as $item)
    {
      $this->addSubMenuItems($item);
    }
  }
    
  public function do_lesser_instructions_page() 
  {
    require(apply_filters('lesser_instructions_path', dirname(__FILE__).'/../views/instructions.php'));
  }
  
  function addForm($mode, $title, $description, $default='/* LESS goes here - visit lesscss.org for details */')
  {
    $this->addSettingFields(
      array(    // Text Area
          'field_id'      => 'lesser_'.$mode.'_less',
          'type'          => 'textarea',
          'title'         => $title,
          'description'   => $description,
          'default'       => $default,
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
    try
    {
      $parser->parse( $less );
      $css = $parser->getCss();
      $data['lesser_'.$mode.'_css'] = $css;
      $data = apply_filters('lesser_before_'.$mode.'_save', $data);
      update_option('Lesser_APF', $data);
    } catch(Exception $e)
    {
      $this->setSettingNotice('LESS parse error: '. $e->getMessage());
    }
  }

  public function load_lesser_common_page( $oAdminPage ) 
  {
    $this->addForm('common', 'Common LESS', 'This LESS will be served to both the public pages and WordPress admin pages.');
  }
  
  function submit_after_Lesser_APF_lesser_common_page()
  {
    $this->processSubmit('common');
  }  
}

new Lesser_APF();
