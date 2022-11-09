<?php

    namespace App\Transformers;

    use Exception;
    use Illuminate\Contracts\Pagination\LengthAwarePaginator;
    use Illuminate\Support\Collection;

    abstract class Transformer
    {

        /**
         * Transform collection of items
         *
         * @param array|Collection|LengthAwarePaginator $items
         * @param Collection|null $include
         * @return array|Collection
         * @throws Exception
         */
        public function transformCollection($items, Collection $include = null)
        {
            if ($items instanceof LengthAwarePaginator) {
                return array_map(function ($item) use ($include) {
                    return $this->transform($item, $include);
                }, $items->items());
            } elseif (is_array($items)) {
                return array_map(function ($item) use ($include) {
                    return $this->transform($item, $include);
                }, $items);
            } elseif ($items instanceof Collection) {
                return $items->map(function ($item) use ($include) {
                    return $this->transform($item, $include);
                });
            }

            throw new Exception('Invalid data passed to the transformer');
        }

        /**
         * Transform an item
         *
         * @param $item
         * @param Collection|null $include
         * @return array
         */
        public abstract function transform($item, Collection $include = null);
    }
