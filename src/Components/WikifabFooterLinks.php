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
class WikifabFooterLinks extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		$ret = '
			<div class="row footer-links">
				<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-about' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-about' )->text() .'">'. wfMessage( 'wffooter-about' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-organization' )->text() .'">'. wfMessage( 'wffooter-organization' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-team' )->text() .'">'. wfMessage( 'wffooter-team' )->text() .'</a></li>
						<li><a href="http://feedback.wikifab.org" target="_blank">'. wfMessage( 'wffooter-community' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-press' )->text() .'">'. wfMessage( 'wffooter-press' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-fablabs' )->text() .'">'. wfMessage( 'wffooter-fablabs' )->text() .'</a></li>
						<li><a href="http://feedback.wikifab.org/t/about-the-wikifab-software-source-code" target="_blank">'. wfMessage( 'wffooter-developers' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-make-a-donation' )->text() .'">'. wfMessage( 'wffooter-make-a-donation' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-support' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-help' )->text() .'">'. wfMessage( 'wffooter-help' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-get-started' )->text() .'">'. wfMessage( 'wffooter-get-started' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-best-practices' )->text() .'">'. wfMessage( 'wffooter-best-practices' )->text() .'</a></li>
						<li><a href="/index.php/Special:Recentchanges">'. wfMessage( 'wffooter-recent-changes' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-privacy-policy' )->text() .'">'. wfMessage( 'wffooter-privacy-policy' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-cookie-policy' )->text() .'">'. wfMessage( 'wffooter-cookie-policy' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-terms-of-use' )->text() .'">'. wfMessage( 'wffooter-terms-of-use' )->text() .'</a></li>
						<li><a href="/index.php/Wikifab:'. wfMessage( 'wffooterlinks-contact' )->text() .'">'. wfMessage( 'wffooter-contact' )->text() .'</a></li>
					</ul>
				</div>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-discover' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-art' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-art' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-clothing-accessories' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-clothing-accessories' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-decoration' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-decoration' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-electronics' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-electronics' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-energy' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-energy' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-food-agriculture' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-food-agriculture' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-furniture' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-furniture' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-health-wellbeing' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-health-wellbeing' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-play-recreation' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-play-recreation' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>&nbsp;</h4>
					<ul class="list-unstyled">
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-house' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-house' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-machines-tools' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-machines-tools' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-music-sound' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-music-sound' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-play-outside' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-play-outside' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-recycling-upcycling' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-recycling-upcycling' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-robotics' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-robotics' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-science-biology' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-science-biology' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-transport-mobility' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-transport-mobility' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4>'. wfMessage( 'wffootertitle-hello' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="https://www.facebook.com/wikifab.org" target="_blank">Facebook</a></li>
						<li><a href="https://twitter.com/wiki_fab" target="_blank">Twitter</a></li>
						<li><a href="https://www.youtube.com/channel/UClGhrVJrS6qk0j3YsmeP2cA/videos?shelf_id=0&view=0&sort=dd" target="_blank">Youtube</a></li>
						<li><a href="https://instagram.com/wikifab/" target="_blank">Instagram</a></li>
						<li><a href="https://github.com/wikifab" target="_blank">GitHub</a></li>
						<li><a href="http://blog.wikifab.org" target="_blank">Blog</a></li>
					</ul>
				</div>
				</div>
				</div>
			</div>
		';


		return $ret;
	}
}
