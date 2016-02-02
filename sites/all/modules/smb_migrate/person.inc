<?php

/**
 * @file person.inc
 * Show nodes migration from drupal 6 to 7.
 */

class PersonMigration extends SMBNodeMigration {
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

    $this->addFieldMapping('field_included_shows', 'field_included_shows');
    $this->addFieldMapping('field_included_shows:field_included_shows_nid', 'field_included_shows:field_included_shows_nid');

   $this->addFieldMapping('field_host_type', 'field_host_type');
   $this->addFieldMapping('field_host_type:entity_id', 'field_host_type:nid');
   $this->addFieldMapping('field_host_type:delta', 'field_host_type:delta');
   $this->addFieldMapping('field_host_type:field_host_type_value', 'field_host_type:field_host_type_value')
        ->callbacks(array($this, 'mapFormat'));

  }
}
