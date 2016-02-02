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


   $this->addFieldMapping('field_related_to', 'field_reference_event');
   $this->addFieldMapping('field_related_to:field_related_to_nid', 'field_reference_event:field_reference_event_nid');

    $this->addFieldMapping('field_support', 'field_support');
    $this->addFieldMapping('field_support:format', 'field_support:format')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_map_link', 'field_map_link');
    $this->addFieldMapping('field_map_link:format', 'field_map_link:format')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_partner_venue', 'field_venue')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_tags', 2)
         ->sourceMigration('Tags');
    $this->addFieldMapping('field_tags:source_type')
         ->defaultValue('tid');
    $this->addFieldMapping('field_tags:create_term')
         ->defaultValue('tid');
     $this->addFieldMapping('field_tags:ignore_case')
          ->defaultValue('tid');

    $this->addFieldMapping('field_artist', 107)
         ->sourceMigration('Artist');
    $this->addFieldMapping('field_artist:source_type')
         ->defaultValue('tid');
   $this->addFieldMapping('field_artist:create_term')
        ->defaultValue('tid');
    $this->addFieldMapping('field_artist:ignore_case')
         ->defaultValue('tid');

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

  }
}
