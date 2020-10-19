<?php
/**
 *  app/Breadcrumbs/Breadcrumbs.php
 *
 * User: 
 * Date-Time: 19.10.20
 * Time: 15:31
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Breadcrumbs;


use Illuminate\Http\Request;

class Breadcrumbs
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function segments()
    {
        return collect($this->request->segments())->map(function ($segment) {
            return new Segment($this->request, $segment);
        })->toArray();
    }
}