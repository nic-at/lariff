<?php
Route::get(
    '/lariff-share-buttons',
    [
        'as'   => 'lariff',
        'uses' => function (
            \Illuminate\Http\Request $request,
            \Nicat\Lariff\Backend $lariffBackend,
            \Illuminate\Config\Repository $config
        ) {
            if ($request->query->has('url')) {
                return $lariffBackend->get($request->query->get('url'));
            }
            if ($config->get('lariff.domain', '') !== '') {
                $alternateUrl = $config->get('lariff.domain', '');
            } else {
                $alternateUrl = $request->getSchemeAndHttpHost();
            }
            return $lariffBackend->get($alternateUrl);
        }
    ]
);