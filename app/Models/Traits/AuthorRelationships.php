<?php

	namespace App\Models\Traits;

use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
	trait AuthorRelationships {
        /**
         * @return BelongsTo
         */
        public function book(): BelongsTo
        {
            return $this->belongsTo(Book::class);
        }
	}
