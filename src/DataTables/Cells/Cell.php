<?php

namespace Khill\Lavacharts\DataTables\Cells;

use Khill\Lavacharts\Exceptions\InvalidFunctionParam;
use Khill\Lavacharts\Support\Customizable;

/**
 * DataCell Object
 *
 * Holds the information for a data point
 *
 * @package   Khill\Lavacharts\DataTables\Cells
 * @since     3.0.0
 * @author    Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2016, KHill Designs
 * @link      http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link      http://lavacharts.com                   Official Docs Site
 * @license   http://opensource.org/licenses/MIT      MIT
 */
class Cell implements \JsonSerializable
{
    /**
     * The cell value.
     *
     * @var string
     */
    protected $v;

    /**
     * A string version of the v value. (Optional)
     *
     * @var string
     */
    protected $f;

    /**
     * An array that is a map of custom values applied to the cell. (Optional)
     *
     * @var array
     */
    protected $p;

    /**
     * Defines a Cell for a DataTable
     *
     * Each cell in the table holds a value. Cells optionally can take a
     * "formatted" version of the data; this is a string version of the data,
     * formatted for display by a visualization. A visualization can (but is
     * not required to) use the formatted version for display, but will always
     * use the data itself for any sorting or calculations that it makes (such
     * as determining where on a graph to place a point). An example might be
     * assigning the values "low" "medium", and "high" as formatted values to
     * numeric cell values of 1, 2, and 3.
     *
     *
     * @param  string       $v The cell value
     * @param  string       $f A string version of the v value
     * @param  array|string $p A map of custom values applied to the cell
     * @throws \Khill\Lavacharts\Exceptions\InvalidFunctionParam
     */
    public function __construct($v = null, $f = '', array $p = [])
    {
        if (is_string($f) === false) {
            throw new InvalidFunctionParam($f, __FUNCTION__, 'string');
        }

        $this->v = $v;
        $this->f = $f;
        $this->p = $p;
    }

    /**
     * Returns the value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->v;
    }

    /**
     * Returns the string format of the value.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->f;
    }

    /**
     * Returns the custom values of the cell.
     *
     * @return string
     */
    public function getCustomValues()
    {
        return $this->f;
    }

    /**
     * Custom serialization of the Cell
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $json = ['v' => $this->v];

        if (empty($this->f) === false) {
            $json['f'] = $this->f;
        }
        
        if (empty($this->p) === false) {
            $json['p'] = $this->p;
        }

        return $json;
    }
}
