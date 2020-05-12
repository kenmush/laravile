<?php namespace App\Setting;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $private
 * @mixin Eloquent
 */
class Setting extends Model {

	/**
	 * @var string
	 */
	protected $table = 'settings';

    protected $fillable = ['name', 'value'];

    protected $casts = ['private' => 'integer'];

    /**
     * Cast setting value to int, if it's a boolean number.
     *
     * @param string $value
     * @return int|string
     */
    public function getValueAttribute($value)
    {
        if ($value === 'false') {
            return false;
        }

        if ($value === 'true') {
            return true;
        }

        if (ctype_digit($value)) {
            return (int) $value;
        }

        return $value;
    }

    /**
     * @param $value
     */
    public function setValueAttribute($value)
    {
        if ($value === true) {
            $value = 'true';
        } else if ($value === false) {
            $value = 'false';
        }

        $this->attributes['value'] = (string) $value;
    }
}
