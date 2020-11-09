<?php

namespace Drupal\imagex_customer\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\imagex_customer\CustomerInterface;
use Drupal\user\UserInterface;


/**
 * Defines the Customer entity.
 *
 * @ingroup advertiser
 *
 * @ContentEntityType(
 *   id = "imagex_customer_customer",
 *   label = @Translation("Customer"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\imagex_customer\CustomerListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\imagex_customer\Form\CustomerForm",
 *       "edit" = "Drupal\imagex_customer\Form\CustomerForm",
 *       "delete" = "Drupal\imagex_customer\Form\CustomerDeleteForm",
 *     },
 *     "access" = "Drupal\imagex_customer\CustomerAccessControlHandler",
 *   },
 *   base_table = "customer",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "canonical" = "/imagex_customer_customer/{imagex_customer_customer}",
 *     "edit-form" = "/imagex_customer_customer/{imagex_customer_customer}/edit",
 *     "delete-form" = "/imagex_customer_customer/{imagex_customer_customer}/delete",
 *     "collection" = "/imagex_customer_customer/list"
 *   },
 *   field_ui_base_route = "imagex_customer.customer_settings",
 * )
 */


class Customer extends ContentEntityBase implements ContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Customer ID'))
      ->setDescription(t('The Internal ID of the Customer entity.'))
      ->setReadOnly(TRUE);

    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Customer entity.'))
      ->setReadOnly(TRUE);

    // Name field for the customer.
    // We set display options for the view as well as the form.
    // Users with correct privileges can change the view and edit configuration.
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Customer name'))
      ->setDescription(t('The name of the Customer entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    // Balance field for the customer.
    // We set display options for the view as well as the form.
    // Users with correct privileges can change the view and edit configuration.
    $fields['balance'] = BaseFieldDefinition::create('float')
      ->setLabel(t('Balance'))
      ->setDescription(t('The Balance of the Customer entity.'))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => 1,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'float',
        'weight' => 1,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }
}
