<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Test\Asset;

use Cloudinary\Asset\Video;
use Cloudinary\Test\Cloudinary\AssetTestCase;
use Cloudinary\Transformation\Parameter\Dimensions\Width;
use Cloudinary\Transformation\Scale;

/**
 * Class VideoTest
 */
final class VideoTest extends AssetTestCase
{
    public function testVideo()
    {
        $v = new Video(self::VIDEO_NAME);

        $v->resize(Scale::scale(new Width(100), 200)->ignoreAspectRatio(true));

        $t_expected = 'c_scale,fl_ignore_aspect_ratio,h_200,w_100';

        self::assertEquals(
            $t_expected,
            (string)$v->getTransformation()
        );

        self::assertVideoUrl(
            "{$t_expected}/".self::VIDEO_NAME,
            (string)$v
        );
    }
}
