<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RasterColumn Entity
 *
 * @property string $r_table_catalog
 * @property string $r_table_schema
 * @property string $r_table_name
 * @property string $r_raster_column
 * @property int $srid
 * @property float $scale_x
 * @property float $scale_y
 * @property int $blocksize_x
 * @property int $blocksize_y
 * @property bool $same_alignment
 * @property bool $regular_blocking
 * @property int $num_bands
 * @property string $pixel_types
 * @property string $nodata_values
 * @property string $out_db
 * @property string $extent
 * @property bool $spatial_index
 */
class RasterColumn extends Entity
{

}
