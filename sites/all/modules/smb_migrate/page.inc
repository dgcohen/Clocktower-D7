<?php

/**
 * @file page.inc
 * Page nodes migration from drupal 6 to 7.
 */

class PageMigration extends SMBNodeMigration {
  public function __construct(array $arguments) {
    parent::__construct($arguments);

    $this->addFieldMapping('is_new', NULL, FALSE)->defaultValue(TRUE);
    $this->addFieldMapping('nid', 'nid');

    $this->addFieldMapping('field_entityref_taxonomy', 3)
         ->sourceMigration('Tags3');

     $this->addFieldMapping('field_image', 'field_image')
          ->sourceMigration('File');
     $this->addFieldMapping('field_image:file_class')
          ->defaultValue('MigrateFileFid');
    $this->addFieldMapping('field_image:title', 'field_image:description')
         ->defaultValue('MigrateFileFid');
     $this->addFieldMapping('field_image:alt', 'field_image:description')
          ->defaultValue('MigrateFileFid');
    $this->addFieldMapping('field_image:preserve_files')
         ->defaultValue('MigrateFileFid');

    $this->addFieldMapping('field_support', 'field_support');
    $this->addFieldMapping('field_support:value', 'field_support:value')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('body:summary', 'field_summary');
    $this->addFieldMapping('body:summary:format', 'field_summary:format');


    $this->addFieldMapping('field_logo', 'field_logo');
    $this->addFieldMapping('field_logo:file-class', 'field_logo:file-class');
    $this->addFieldMapping('field_logo:preserve_files', 'field_logo:preserve_files');
    $this->addFieldMapping('field_logo:file_replace', 'field_logo:file_replace');
    $this->addFieldMapping('field_logo:source_dir', 'field_logo:source_dir');
    $this->addFieldMapping('field_logo:alt', 'field_logo:alt');
    $this->addFieldMapping('field_logo:title', 'field_logo:title');
    $this->addFieldMapping('field_logo:destination_dir', 'field_logo:destination_dir');
    $this->addFieldMapping('field_logo:urlencode', 'field_logo:urlencode')
         ->sourceMigration('File');

    $this->addFieldMapping('field_pdf', 'field_pdf');
    $this->addFieldMapping('field_pdf:file_class', 'field_pdf:file-class');
    $this->addFieldMapping('field_pdf:preserve_files', 'field_pdf:preserve_files');
    $this->addFieldMapping('field_pdf:source_dir', 'field_pdf:source_dir');
    $this->addFieldMapping('field_pdf:destination_file', 'field_pdf:destination_file');
    $this->addFieldMapping('field_pdf:destination_dir', 'field_pdf:destination_dir');
    $this->addFieldMapping('field_pdf:urlencode', 'field_pdf:urlencode')
         ->sourceMigration('File');


  }
}
