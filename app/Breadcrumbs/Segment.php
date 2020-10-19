<?php
/**
 *  app/Breadcrumbs/Segment.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:31
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Breadcrumbs;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Segment
{
    protected $request;

    protected $segment;

    public function __construct(Request $request, $segment)
    {
        $this->request = $request;
        $this->segment = $segment;
    }

    public function name()
    {
        return ($this->segment == 'admin') ? 'Home' : $this->segment;
    }

    public function model()
    {
        // Todo get route parameter model
//         return collect($this->request->route()->parameters())->where('slug',$this->segment);
    }

    public function url()
    {
        return url(implode('/',array_slice($this->request->segments(), 0, $this->position() + 1)));
    }

    public function position()
    {
        return array_search($this->segment, $this->request->segments());
    }
}