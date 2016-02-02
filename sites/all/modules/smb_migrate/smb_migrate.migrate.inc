<?php

/**
 * Implements hook_migrate_api().
 */

function smb_migrate_migrate_api() {
  $api = array(
    'api' => 2,
    'groups' => array(
      'content_migration' => array(
        'title' => t('SMB Drupal 6 to Drupal 7 content migration example.'),
      ),
      'taxonomy' => array(
        'title' => t('SMB Drupal 6 to Drupal 7 taxonomy migration example.')
      ),
    ),
  );

  // Specify the DB connection and the source Drupal version.
  $common_arguments = array(
    'source_connection' => 'legacy',
    'source_version' => 6,
    'group_name' => 'content_migration',
    'format_mappings' => array(
      '0' => 'full_html',
      '1' => 'full_html',
      '2' => 'full_html',
      '3' => 'full_html',
      '4' => 'full_html',
      '5' => 'full_html',
    ),
  );

  /**
   * Register the user migration.
   * We just use the migrate_d2d D6 migration class as-is.
   */
  $api['migrations']['User'] = $common_arguments + array(
    'description' => t('Migration of users from Drupal 6'),
    'class_name' => 'DrupalUser6Migration',
  );

  /**
   * For vocabulary migrations, source_vocabulary and destination_vocabulary are
   * required arguments. Note that in Drupal 6 vocabularies did not have machine
   * names, so we use the vocabulary ID to uniquely identify them.
   */
  $vocabulary_arguments = array(
    'Tags' => array(
      'description' => t('Migration of Topics terms from Drupal 6'),
      'source_vocabulary' => '2',  // D6 Vocabulary ID
      'destination_vocabulary' => 'tags',
      'group_name' => 'taxonomy',
    ),
    'Category' => array(
      'description' => t('Migration of Topics terms from Drupal 6'),
      'source_vocabulary' => '105',  // D6 Vocabulary ID
      'destination_vocabulary' => 'category',
      'group_name' => 'taxonomy',
    ),
    'RadioTags' => array(
      'description' => t('Migration of Topics terms from Drupal 6'),
      'source_vocabulary' => '106',  // D6 Vocabulary ID
      'destination_vocabulary' => 'radio_tags',
      'group_name' => 'taxonomy',
    ),
    'Artist' => array(
      'description' => t('Migration of Topics terms from Drupal 6'),
      'source_vocabulary' => '107',  // D6 Vocabulary ID
      'destination_vocabulary' => 'artist',
      'group_name' => 'taxonomy',
    ),
    'BlogCategories' => array(
      'description' => t('Migration of Topics terms from Drupal 6'),
      'source_vocabulary' => '108',  // D6 Vocabulary ID
      'destination_vocabulary' => 'blog_categories',
      'group_name' => 'taxonomy',
    ),
  );

  /**
   * Again, we're using the migrate_d2d class directly.
   * The soft dependency says that while we don't have to run the user migration
   * first, we want to make sure it's listed first so the vocabularies are
   * listed right ahead of the node migrations.
   */
  $common_vocabulary_arguments = $common_arguments + array(
    'class_name' => 'DrupalTerm6Migration',
    'soft_dependencies' => array('User'),
  );

  foreach ($vocabulary_arguments as $migration_name => $arguments) {
    $arguments += $common_vocabulary_arguments;
    $api['migrations'][$migration_name] = $arguments;
  }

  // Register the file migration.
  // source_dir needs to be adjusted to match your file system.
  $api['migrations']['File'] = $common_arguments + array(
    'machine_name' => 'filemigration',
    'description' => t('Import Drupal 6 files'),
    'class_name' => 'SMBFile6Migration',
    'user_migration' => 'User',
    'default_uid' => 1,
    'source_dir' => DRUPAL_ROOT . '/../clocktower',
    'destination_dir' => 'public://legacy_files',
  );

  /**
   * Node migrations - each has its own class derived from the migrate_d2d class,
   * specifying its particular field mappings and transformations. source_type
   * and destination_type are required arguments.
   */
  $node_arguments = array(
    'Page' => array(
      'class_name' => 'PageMigration',
      'description' => t('Migration of page nodes from Drupal 6'),
      'source_type' => 'page',
      'destination_type' => 'page',
    ),
    'BlogEntry' => array(
      'class_name' => 'BlogMigration',
      'description' => t('Migration of page nodes from Drupal 6'),
      'source_type' => 'blog',
      'destination_type' => 'blog',
    ),
    'Event' => array(
      'class_name' => 'EventMigration',
      'description' => t('Migration of event nodes from Drupal 6'),
      'source_type' => 'event',
      'destination_type' => 'event',
    ),
    'Exhibition' => array(
      'class_name' => 'ExhibitionMigration',
      'description' => t('Migration of exhibition nodes from Drupal 6'),
      'source_type' => 'exhibition',
      'destination_type' => 'exhibition',
    ),
    'Show' => array(
      'class_name' => 'ShowMigration',
      'description' => t('Migration of show nodes from Drupal 6'),
      'source_type' => 'show',
      'destination_type' => 'show',
    ),
    'Person' => array(
      'class_name' => 'PersonMigration',
      'description' => t('Migration of person nodes from Drupal 6'),
      'source_type' => 'host',
      'destination_type' => 'person',
    ),
    'Partner' => array(
      'class_name' => 'PartnerMigration',
      'description' => t('Migration of partner nodes from Drupal 6'),
      'source_type' => 'partner',
      'destination_type' => 'partner',
    ),
    'Residency' => array(
      'class_name' => 'ResidencyMigration',
      'description' => t('Migration of residency nodes from Drupal 6'),
      'source_type' => 'residency',
      'destination_type' => 'residency',
    ),
    'Series' => array(
      'class_name' => 'SeriesMigration',
      'description' => t('Migration of series nodes from Drupal 6'),
      'source_type' => 'series',
      'destination_type' => 'series',
    ),
  );

  /**
   * Tell the node migrations where the users are coming from, so they can
   * set up the dependency and resolve D6->D7 uids.
   */
  $common_node_arguments = $common_arguments + array(
      'user_migration' => 'User'
    );

  foreach ($node_arguments as $migration_name => $arguments) {
    $arguments = array_merge_recursive($arguments, $common_node_arguments);
    $api['migrations'][$migration_name] = $arguments;
  }

  return $api;
}
