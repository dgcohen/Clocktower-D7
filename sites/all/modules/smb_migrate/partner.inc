<?php

/**
 * @file partner.inc
 * Partner nodes migration from drupal 6 to 7.
 */

class PartnerMigration extends SMBNodeMigration {
  public function __construct(array $arguments) {
    parent::__construct($arguments);

    $this->addFieldMapping('is_new', NULL, FALSE)->defaultValue(TRUE);
    $this->addFieldMapping('nid', 'nid');

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

     $this->addFieldMapping('field_logos', 'field_logos')
          ->sourceMigration('File');
     $this->addFieldMapping('field_logos:file_class')
          ->defaultValue('MigrateFileFid');
    $this->addFieldMapping('field_logos:title', 'field_logos:description')
         ->defaultValue('MigrateFileFid');
     $this->addFieldMapping('field_logos:alt', 'field_logos:description')
          ->defaultValue('MigrateFileFid');
    $this->addFieldMapping('field_logos:preserve_files')
         ->defaultValue('MigrateFileFid');


   $this->addFieldMapping('field_related_to', 'field_reference_event');
   $this->addFieldMapping('field_related_to:field_related_to_nid', 'field_reference_event:field_reference_event_nid');

    $this->addFieldMapping('field_support', 'field_support');
    $this->addFieldMapping('field_support:value', 'field_support:value')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('body:summary', 'field_summary');
    $this->addFieldMapping('body:summary:format', 'field_summary:format');


    $this->addFieldMapping('field_map_link', 'field_map_link');
    $this->addFieldMapping('field_map_link:format', 'field_map_link:format')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_partner_venue', 'field_venue')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_venue', 'field_venue');
    $this->addFieldMapping('field_venue:format', 'field_venue:format')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_tags', 2)
         ->sourceMigration('Tags');
    $this->addFieldMapping('field_tags:source_type')
         ->defaultValue('tid');
    $this->addFieldMapping('field_tags:create_term')
         ->defaultValue('tid');
     $this->addFieldMapping('field_tags:ignore_case')
          ->defaultValue('tid');


    $this->addFieldMapping('field_logos', 'field_logos');
    $this->addFieldMapping('field_logos:file-class', 'field_logos:file-class');
    $this->addFieldMapping('field_logos:preserve_files', 'field_logos:preserve_files');
    $this->addFieldMapping('field_logos:file_replace', 'field_logos:file_replace');
    $this->addFieldMapping('field_logos:source_dir', 'field_logos:source_dir');
    $this->addFieldMapping('field_logos:alt', 'field_logos:alt');
    $this->addFieldMapping('field_logos:title', 'field_logos:title');
    $this->addFieldMapping('field_logos:destination_dir', 'field_logos:destination_dir');
    $this->addFieldMapping('field_logos:urlencode', 'field_logos:urlencode')
         ->sourceMigration('File');

  }
}
