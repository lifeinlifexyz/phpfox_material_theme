<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: welcome.html.php 3382 2011-10-31 11:53:10Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !empty($sWelcomeContent)}
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-offset-0">
                <h4 class="description text-center">
                    {$sWelcomeContent}
                </div>
            </div>
        </div>
    </div>
</div>
{/if}
