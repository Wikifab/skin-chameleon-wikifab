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
class LowtechlabFooterLinks extends Component {

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
				<div class="col-md-7 col-sm-7 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-about' )->text() .'</h4>
					<p class="ltl-footer-text">Le Low-tech Lab est porté par Gold of Bengal.</p>
					<p class="ltl-footer-text">Association 1901, Gold of Bengal a pour mission la recherche, l’aide au développement et la promotion de solutions répondant à des problématiques d’intérêt général, dans le respect et la valorisation de la nature ainsi que des ressources propres à chaque territoire.</p>
					<div><img src="/skins/lowtechlab-skin/images/logo-gob.png">
					<span class="ltl-footer-link"><a href="http://goldofbengal.com">www.goldofbengal.com</a></span>
					</div>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-support' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="http://lowtechlab.org/faq">'. wfMessage( 'wffooter-faq-ltl' )->text() .'</a></li>
						<li><a href="http://beta.wikifab.org/index.php/Wikifab:'. wfMessage( 'wffooterlinks-get-started' )->text() .'" target="_blank">'. wfMessage( 'wffooter-get-started' )->text() .'</a></li>
						<li><a href="http://beta.wikifab.org/index.php/Wikifab:'. wfMessage( 'wffooterlinks-best-practices' )->text() .'" target="_blank">'. wfMessage( 'wffooter-best-practices' )->text() .'</a></li>
						<li><a href="/index.php/Special:Recentchanges">'. wfMessage( 'wffooter-recent-changes' )->text() .'</a></li>
						<li><a href="http://lowtechlab.org/mentions-legales">'. wfMessage( 'wffooter-cookie-policy' )->text() .'</a></li>
						<li><a href="http://lowtechlab.org/cgu">'. wfMessage( 'wffooter-terms-of-use' )->text() .'</a></li>
						<li><a href="http://lowtechlab.org/contact-ltl">'. wfMessage( 'wffooter-contact' )->text() .'</a></li>
					</ul>
				</div>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>'. wfMessage( 'wffootertitle-themesLTL' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-1' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-1' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-2' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-2' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-3' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-3' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-4' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-4' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-5' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-5' )->text() .'</a></li>
						<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-6' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-6' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>&nbsp;</h4>
					<ul class="list-unstyled">
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-7' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-7' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-8' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-8' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-9' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-9' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-10' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-10' )->text() .'</a></li>
					<li><a href="/index.php/Special:WfExplore?wf-expl-area-'. wfMessage( 'wffooterlinks-categoriename-ltl-11' )->text() .'=on">'. wfMessage( 'wffooter-categoriename-ltl-11' )->text() .'</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4>'. wfMessage( 'wffootertitle-hello' )->text() .'</h4>
					<ul class="list-unstyled">
						<li><a href="https://www.facebook.com/lowtechlab/" target="_blank">Facebook</a></li>
						<li><a href="https://twitter.com/GoldofBengal" target="_blank">Twitter</a></li>
						<li><a href="https://www.youtube.com/channel/UCu6mFdACj_quODcUujiT62Q" target="_blank">Youtube</a></li>
						<li><a href="https://www.instagram.com/goldofbengal/" target="_blank">Instagram</a></li>
						<li><a href="http://goldofbengal.com/#footer-sidebar-4" target="_blank">Newsletter</a></li>
					</ul>
				</div>
				</div>
				</div>
			</div>
		';
		return $ret;
	}
}
