<?php
/**
 * Created by PhpStorm.
 * User: phpuzem
 * Date: 20.10.2015
 * Time: 20:40
 */

namespace Phpuzem\Kuveyt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Description of KuveytFacade
 *
 * @author phpuzem
 */
class Kuveyt extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'kuveyt';
    }
}