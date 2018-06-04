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
		global $wgScriptPath, $wgLang;

		$langCode = $wgLang->getCode();

		$ret = '
			<div class="row footer-links">
				<div class="col-md-5 col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>'. wfMessage( 'wffootertitle-about' )->text() .'</h4>
							<ul class="list-unstyled">
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:About">'. wfMessage( 'wffooter-about' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/AboutGroups">'. wfMessage( 'wffooter-fablabs' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:Developers">'. wfMessage( 'wffooter-developers' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:Press">'. wfMessage( 'wffooter-press' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Contact">'. wfMessage( 'wffooter-contact' )->text() .'</a></li>
							</ul>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>'. wfMessage( 'wffootertitle-support' )->text() .'</h4>
							<ul class="list-unstyled">
								<li><a href="' . $wgScriptPath . '/index.php/Help">'. wfMessage( 'wffooter-help' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:Creator_handbook">'. wfMessage( 'wffooter-creator-handbook' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Special:Recentchanges">'. wfMessage( 'wffooter-recent-changes' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:Privacy_policy">'. wfMessage( 'wffooter-privacy-policy' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:Cookie_policy">'. wfMessage( 'wffooter-cookie-policy' )->text() .'</a></li>
								<li><a href="' . $wgScriptPath . '/index.php/Wikifab:Terms_of_use">'. wfMessage( 'wffooter-terms-of-use' )->text() .'</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-6 col-xs-12">
				<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-discover' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Art=on">'. wfMessage( 'wffooter-categoriename-art' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Clothing+and+Accessories=on">'. wfMessage( 'wffooter-categoriename-clothing-accessories' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Decoration=on">'. wfMessage( 'wffooter-categoriename-decoration' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Electronics=on">'. wfMessage( 'wffooter-categoriename-electronics' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Energy=on">'. wfMessage( 'wffooter-categoriename-energy' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Food+and+Agriculture=on">'. wfMessage( 'wffooter-categoriename-food-agriculture' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Furniture=on">'. wfMessage( 'wffooter-categoriename-furniture' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Health+and+Wellbeing=on">'. wfMessage( 'wffooter-categoriename-health-wellbeing' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-House=on">'. wfMessage( 'wffooter-categoriename-house' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>&nbsp;</h4>
					<ul class="list-unstyled">					
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Machines+and+Tools=on">'. wfMessage( 'wffooter-categoriename-machines-tools' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Music+and+Sound=on">'. wfMessage( 'wffooter-categoriename-music-sound' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Sport+and+Outside=on">'. wfMessage( 'wffooter-categoriename-play-outside' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Play+and+Hobbies=on">'. wfMessage( 'wffooter-categoriename-play-recreation' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Recycling+and+Upcycling=on">'. wfMessage( 'wffooter-categoriename-recycling-upcycling' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Robotics=on">'. wfMessage( 'wffooter-categoriename-robotics' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Science+and+Biology=on">'. wfMessage( 'wffooter-categoriename-science-biology' )->text() .'</a></li>
						<li><a href="' . $wgScriptPath . '/index.php/Explore?title=Special:WfExplore&query=&wf-expl-Area-Transport+and+Mobility=on">'. wfMessage( 'wffooter-categoriename-transport-mobility' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4>'. wfMessage( 'wffootertitle-hello' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="https://www.facebook.com/wikifab.org" target="_blank">Facebook</a></li>
						<li><a href="https://twitter.com/wiki_fab" target="_blank">Twitter</a></li>
						<li><a href="https://www.youtube.com/channel/UC4wxjCQFTttfvVceVudo68Q" target="_blank">Youtube</a></li>
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
