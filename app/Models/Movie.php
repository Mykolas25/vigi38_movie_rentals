<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'release_date',
        'rating',
        'runtime',
        'image',
        'description',
    ];

    //Always query with these relations
    public $with = ['genres', 'languages', 'countries', 'actors'];

    /**
     * @return BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * @return BelongsToMany
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }

    /**
     * @return BelongsToMany
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    public function customUpdate(Request $request)
    {
        $this->genres()->sync($request->get('genres'));
        $this->countries()->sync($request->get('countries'));
        $this->languages()->sync($request->get('languages'));
        $this->actors()->sync($request->get('actors'));

        $images = $request->file('images');

        if ($images) {
            $images = $this->uploadImages($images);
            collect($images)->each(function (string $item, int $key) {
                MovieImage::updateOrCreate([
                    'name' => $item,
                    'movie_id' => $this->id
                ]);
            });
        }
        
        $this->fill($request->input())->save();
    }

    public function uploadImages(array $images): array
    {
        $paths = [];
        foreach ($images as $image) {

            if (!$image instanceof UploadedFile) {
                throw new \Exception('Instance of Illuminate\Http\UploadedFile file expected');
            }

            $imageName = $image->getClientOriginalName();
            $image->storeAs(
                'public/images',
                $image->getClientOriginalName()
            );
            $paths[] = $imageName;
        }

        return $paths;
    }
}
