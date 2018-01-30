<?php
/**
 * File containing the Wikifab Footer class
 *
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

use Linker;

/**
 * ToolbarHorizontal class
 *
 * A horizontal toolbar containing standard sidebar items (toolbox, language links).
 *
 * The toolbar is an unordered list in a nav element: <nav role="navigation" id="p-tb" >
 *
 * @author Stephan Gambke
 * @since 1.0
 * @ingroup Skins
 */
class WikifabFooter extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {


		$ret = '
			<div class="row">
				<div class="col-md-5">
					'. wfMessage( 'wffootersubtitle' )->text() .'.
				</div>
				<div class="col-md-7 footer-social-icons">
					<ul class="list-unstyled">
						<li><a href="https://www.facebook.com/wikifab.org" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
						<li><a href="https://twitter.com/wiki_fab" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UC4wxjCQFTttfvVceVudo68Q" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						<li><a href="https://instagram.com/wikifab/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://github.com/wikifab" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		';
		return $ret;

	}
}
