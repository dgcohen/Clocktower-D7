<?php

/**
 * @file blog.inc
 * Blog nodes migration from drupal 6 to 7.
 */

class BlogMigration extends SMBNodeMigration {
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

    $this->addFieldMapping('field_media_embed', 'field_media_embed');
    $this->addFieldMapping('field_media_embed:format', 'field_media_embed:format')
         ->callbacks(array($this, 'mapFormat'));

   $this->addFieldMapping('field_artist', 107)
        ->sourceMigration('Artist');
   $this->addFieldMapping('field_artist:source_type')
        ->defaultValue('tid');
  $this->addFieldMapping('field_artist:create_term')
       ->defaultValue('tid');
   $this->addFieldMapping('field_artist:ignore_case')
        ->defaultValue('tid');

    $this->addFieldMapping('field_blog_categories', 108)
         ->sourceMigration('BlogCategories');
    $this->addFieldMapping('field_blog_categories:source_type')
         ->defaultValue('tid');
   $this->addFieldMapping('field_blog_categories:create_term')
        ->defaultValue('tid');
    $this->addFieldMapping('field_blog_categories:ignore_case')
         ->defaultValue('tid');
  }
}