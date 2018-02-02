Pager extends
============================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist integready/yii2-pagerextends "@dev"
```

or add

```
"integready/yii2-pagerextends": "@dev"
```

to the require section of your `composer.json` file.

Inserting a widget in GridView:
--

### Included variables (`#INCLUDED`):
###### # These are NOT variables, you do not need to write them into the code, replace them with the correct strings or your variables! They are for what would be clear where you need to write the same para- meters.
* `$idGrid // string`

### Example:
* index.php `(View)`:
```php
<?php

use yii\grid\GridView;

?>
<?= GridView::widget([
    'id'            => $idGrid, #INCLUDED
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'as pager' => 'integready\pagerextends\PagerBehavior',
    'pager' => [
        'class' => 'integready\pagerextends\LinkPager',
        'template'      => '{pageButtons} {pageSize}',
        'pageSizeList'  => [10, 50, 1000, 5000],
    ],
    'columns'       => [
        // Columns list
    ],
]); ?>
```
