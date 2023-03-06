<?php

namespace Drupal\server_general\Plugin\EntityViewBuilder;

use Drupal\media\MediaInterface;
use Drupal\pluggable_entity_view_builder\BuildFieldTrait;
use Drupal\pluggable_entity_view_builder\EntityViewBuilderPluginAbstract;
use Drupal\server_general\CardTrait;

/**
 * The "Document" media plugin.
 *
 * @EntityViewBuilder(
 *   id = "media.document",
 *   label = @Translation("Media - Document"),
 *   description = "Media view builder for 'Document' bundle."
 * )
 */
class MediaDocument extends EntityViewBuilderPluginAbstract {

  use BuildFieldTrait;
  use CardTrait;

  /**
   * Build the "Card" view mode.
   *
   * @param array $build
   *   The existing build.
   * @param \Drupal\media\MediaInterface $entity
   *   The entity.
   *
   * @return array
   *   Render array.
   */
  public function buildCard(array $build, MediaInterface $entity): array {
    /** @var \Drupal\file\FileInterface $file */
    $file = $this->getReferencedEntityFromField($entity, 'field_media_file');

    $build[] = $this->buildCardMediaDocument($entity, $file);

    return $build;
  }

}
