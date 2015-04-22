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
					<h4>A propos</h4>
					<ul class="list-unstyled">
						<li>Qu\'est-ce que Wikifab ?</li>
						<li>Qui sommes nous ?</li>
						<li>Nous rejoindre</li>
						<li>Presse</li>
						<li>Fablabs et makerspaces</li>
						<li>Faire un don</li>
					</ul>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h4>Aide</h4>
					<ul class="list-unstyled">
						<li>Toute l\'aide</li>
						<li>L\'indispensable</li>
						<li>Confiance et sécurité</li>
						<li>Contactez-nous</li>
						<li>Mentions légales</li>
						<li>Conditions générales</li>
					</ul>
				</div>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>Découvrir</h4>
					<ul class="list-unstyled">
						<li>Bois</li>
						<li>Mobilier</li>
						<li>Extérieur</li>
						<li>Couture</li>
						<li>Véhicule</li>
						<li>Lampe</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>&nbsp;</h4>
					<ul class="list-unstyled">
						<li>Technologie</li>
						<li>Electronique</li>
						<li>Art</li>
						<li>Papier</li>
						<li>Technique</li>
						<li>Réparation</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4>Bonjour</h4>
					<ul class="list-unstyled">
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Pinterest</li>
						<li>GitHhub</li>
						<li>Le Blog</li>
					</ul>
				</div>
				</div>
				</div>
			</div>
		';
		return $ret;
	}
}
