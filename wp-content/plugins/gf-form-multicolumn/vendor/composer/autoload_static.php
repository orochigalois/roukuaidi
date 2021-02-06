<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe1240e83bedcde928b3f6f3db07da3f {
	public static $prefixLengthsPsr4 = [
		'W' =>
			[
				'WH\\GF\\Multicolumn\\Site\\'         => 23,
				'WH\\GF\\Multicolumn\\Classes\\'      => 26,
				'WH\\GF\\Multicolumn\\Admin\\Field\\' => 30,
				'WH\\GF\\Multicolumn\\Admin\\'        => 24,
				'WH\\GF\\Multicolumn\\'               => 18,
			],
	];

	public static $prefixDirsPsr4 = [
		'WH\\GF\\Multicolumn\\Site\\'         =>
			[
				0 => __DIR__ . '/../..' . '/includes/public',
			],
		'WH\\GF\\Multicolumn\\Classes\\'      =>
			[
				0 => __DIR__ . '/../..' . '/includes',
			],
		'WH\\GF\\Multicolumn\\Admin\\Field\\' =>
			[
				0 => __DIR__ . '/../..' . '/includes/admin/field',
			],
		'WH\\GF\\Multicolumn\\Admin\\'        =>
			[
				0 => __DIR__ . '/../..' . '/includes/admin',
			],
		'WH\\GF\\Multicolumn\\'               =>
			[
				0 => __DIR__ . '/../..' . '/',
			],
	];

	public static function getInitializer( ClassLoader $loader ) {
		return \Closure::bind( function () use ( $loader ) {
			$loader->prefixLengthsPsr4 = ComposerStaticInitfe1240e83bedcde928b3f6f3db07da3f::$prefixLengthsPsr4;
			$loader->prefixDirsPsr4    = ComposerStaticInitfe1240e83bedcde928b3f6f3db07da3f::$prefixDirsPsr4;

		}, null, ClassLoader::class );
	}
}