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
						<li><a href="/index.php/Wikifab:À_propos">Qu\'est-ce que Wikifab ?</a></li>
						<li><a href="/index.php/Wikifab:Equipe">Qui sommes nous ?</a></li>
						<li><a href="/index.php/Wikifab:Nous_rejoindre">Nous rejoindre</a></li>
						<li><a href="/index.php/Wikifab:Presse">Presse</a></li>
						<li><a href="/index.php/Wikifab:Fablabs">Fablabs et makerspaces</a></li>
						<li><a href="/index.php/Wikifab:Faire_un_don">Faire un don</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h4>Aide</h4>
					<ul class="list-unstyled">
						<li><a href="/index.php/Aide">Toute l\'aide</a></li>
						<li><a href="/index.php/Apprendre">L\'indispensable</a></li>
						<li><a href="/index.php/Wikifab:Confiance_et_securité">Confiance et sécurité</a></li>
						<li><a href="/index.php/Wikifab:Contactez_nous">Contactez-nous</a></li>
						<li><a href="/index.php/Wikifab:Mentions_légales">Mentions légales</a></li>
						<li><a href="/index.php/Wikifab:Conditions_générales">Conditions générales</a></li>
					</ul>
				</div>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>Découvrir</h4>
					<ul class="list-unstyled">
						<li>Art</li>
						<li>Arduino & Raspberry pi</li>
						<li>Artisanat & Fait main</li>
						<li>Musique & Sons</li>
						<li>Énergie & Transport</li>
						<li>Mobilier</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h4>&nbsp;</h4>
					<ul class="list-unstyled">
						<li>Vêtement & couture</li>
						<li>Nourriture & agriculture</li>
						<li>Sport & Extérieur</li>
						<li>Technologie</li>
						<li>Science & Biologie</li>
						<li>Impression 3D</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4>Bonjour</h4>
					<ul class="list-unstyled">
						<li><a href="https://www.facebook.com/wikifab.org" target="_blank">Facebook</a></li>
						<li><a href="https://twitter.com/wikifab_org" target="_blank">Twitter</a></li>
						<li><a href="https://instagram.com/wikifab/" target="_blank">Instagram</a></li>
						<li><a href="https://www.pinterest.com/wikifab_org/" target="_blank">Pinterest</a></li>
						<li><a href="https://github.com/wiki-fab" target="_blank">GitHhub</a></li>
						<li><a href="http://blog.wikifab.org" target="_blank">Le Blog</a></li>
					</ul>
				</div>
				</div>
				</div>
			</div>
		';
		return $ret;
	}
}
