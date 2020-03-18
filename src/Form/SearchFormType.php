<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', TextType::class)
            ->add('zip', NumberType::class)
            ->add('infra', ChoiceType::class, [
                'choices' => [
                    'Plateforme d\'accompagnement et de répit pour les aidants de personnes âgées' => 'accompagnement_personnes_agees',
                    'Information sur le logement (agenceAgence départementale pour l’information sur le logement (ADIL) départementale, Adil)' => 'adil',
                    'Association nationale pour la formation professionnelle des adultes (AFPA), réseau local' => 'afpa',
                    'Agence nationale de l’habitat (ANAH), réseau local' => 'anah',
                    'Association pour l’emploi des cadres (APEC)' => 'apec',
                    'Association pour l\'emploi des cadres, ingénieurs et techniciens de l\'agriculture et de l\'agroalimentaire (APECITA), réseau local' => 'apecita',
                    'Agence régionale de santé (ARS)' => 'ars',
                    'Délégation territoriale de l\'Agence régionale de santé' => 'ars_antenne',
                    'Banque de France, succursale' => 'banque_de_france',
                    'Bureau d\'aide aux victimes' => 'bav',
                    'Bureau ou centre du service national' => 'bsn',
                    'Cour administrative d’appel' => 'caa',
                    'Caisse d’allocations familiales (CAF)' => 'caf',
                    'Caisse d\'assurance retraite et de la santé au travail (CARSAT)' => 'carsat',
                    'Centre communal d\'action sociale' => 'ccas',
                    'Chambre de commerce et d’industrie (CCI)' => 'cci',
                    'Centre départemental d\'action sociale' => 'cdas',
                    'Centre départemental de documentation pédagogique' => 'cddp',
                    'Centre de gestion de la fonction publique territoriale' => 'cdg',
                    'Centre de détention' => 'centre_detention',
                    'Centre des impôts foncier et cadastre' => 'centre_impots_fonciers',
                    'Centre pénitentiaire' => 'centre_penitentiaire',
                    'Centre social' => 'centre_social',
                    'Conseil économique, social et environnemental régional' => 'cesr',
                    'Conseil départemental' => 'cg',
                    'Chambre d’agriculture' => 'chambre_agriculture',
                    'Chambre de métiers et de l’artisanat' => 'chambre_metier',
                    'Centre d’information de conseil et d\'accueil des salariés (CICAS)' => 'cicas',
                    'Centre d’information sur les droits des femmes et des familles (CIDFF)' => 'cidf',
                    'Information jeunesse, réseau local' => 'cij',
                    'Centre d’information et d’orientation (CIO)' => 'cio',
                    'Commission d\'indemnisation des victimes d\'infraction' => 'civi',
                    'Point d\'information local dédié aux personnes âgées' => 'clic',
                    'Centre national de la fonction publique territoriale (CNFPT), réseau local' => 'cnfpt',
                    'Centre en route de la navigation aérienne' => 'cnra',
                    'Commissariat de police' => 'commissariat_police',
                    'Commission départementale de conciliation' => 'commission_conciliation',
                    'Conciliateur fiscal' => 'conciliateur_fiscal',
                    'Conseil de la culture, de l’éducation et de l’environnement' => 'conseil_culture',
                    'Cour d’appel' => 'cour_appel',
                    'Caisse primaire d’assurance maladie (CPAM)' => 'cpam',
                    'Conseil régional' => 'cr',
                    'Chambre régionale ou territoriale des comptes' => 'crc',
                    'Centre régional de documentation pédagogique' => 'crdp',
                    'Centre régional d’éducation populaire et de sports (CREPS)' => 'creps',
                    'Centre ou délégation régionale de recrutement et de formation de la police nationale' => 'crfpn',
                    'Centre de ressources et d\'information des bénévoles (CRIB)' => 'crib',
                    'CROUS et ses antennes' => 'crous',
                    'Centre de semi-liberté' => 'csl',
                    'Direction de l’aviation civile' => 'dac',
                    'Droit des femmes et égalité, mission départementale' => 'dd_femmes',
                    'Direction départementale des finances publiques' => 'dd_fip',
                    'Direction départementale de la cohésion sociale (DDCS)' => 'ddcs',
                    'Direction départementale de la cohésion sociale et de la protection des populations (DDCSPP)' => 'ddcspp',
                    'Direction territoriale de la protection judiciaire de la jeunesse' => 'ddpjj',
                    'Protection des populations (direction départementale, DDPP)' => 'ddpp',
                    'Direction départementale ou service de la sécurité publique' => 'ddsp',
                    'Direction départementale des territoires -et de la mer- (DDT)' => 'ddt',
                    'Défenseur des droits' => 'defenseur_droits',
                    'Direction interdépartementale des routes' => 'did_routes',
                    'Direction interrégionale de la mer' => 'dir_mer',
                    'Météo France, direction interrégionale' => 'dir_meteo',
                    'Direction interrégionale de la police judiciaire' => 'dir_pj',
                    'Direction régionale des entreprises, de la concurrence, de la consommation, du travail et de l\'emploi' => 'direccte',
                    'Unité territoriale - Direction régionale des entreprises, de la concurrence, de la consommation, du travail et de l\'emploi' => 'direccte_ut',
                    'Délégation à la mer et au littoral' => 'dml',
                    'Délégation régionale aux droits des femmes et à l’égalité' => 'dr_femmes',
                    'Direction régionale des finances publiques' => 'dr_fip',
                    'Délégation régionale de l’INSEE' => 'dr_insee',
                    'Direction régionale des affaires culturelles (DRAC)' => 'drac',
                    'Direction régionale de l\'alimentation, de l’agriculture et de la forêt (DRAAF)' => 'draf',
                    'Direction interrégionale et régionale des douanes' => 'drddi',
                    'Direction régionale de l’environnement, de l’aménagement et du logement (DREAL)' => 'dreal',
                    'Unité territoriale - Direction régionale de l\'environnement, de l\'aménagement et du logement (DREAL)' => 'dreal_ut',
                    'Direction régionale et interdépartementale de l\'équipement et de l\'aménagement (DRIEA)' => 'driea',
                    'Unité territoriale - Direction régionale et interdépartementale de l\'équipement et de l\'aménagement (DRIEA)' => 'driea_ut',
                    'Direction régionale et interdépartementale de l\'environnement et de l\'énergie (DRIEE)' => 'driee',
                    'Unité territoriale - Direction régionale et interdépartementale de l\'environnement et de l\'énergie (DRIEE)' => 'driee_ut',
                    'Direction régionale et interdépartementale de l\'hébergement et du Hébergement et logement (direction logement (DRIHL) régionale et' => 'drihl',
                    'Unité territoriale - Direction régionale et interdépartementale de l\'hébergement et du logement (DRIHL)' => 'drihl_ut',
                    'Direction régionale de la jeunesse, des sports et de la cohésion sociale' => 'drjscs',
                    'Délégation régionale de l’ONISEP' => 'dronisep',
                    'Direction interdépartementale ou régionale de la protection judiciaire de la jeunesse' => 'drpjj',
                    'Délégation régionale à la recherche et à la technologie' => 'drrt',
                    'Direction interrégionale des services pénitentiaires' => 'drsp',
                    'Direction zonale de la police aux frontières' => 'dz_paf',
                    'Établissement départemental d\'actions sociales' => 'edas',
                    'Intercommunalité' => 'epci',
                    'Etablissement spécialisé pour mineurs' => 'esm',
                    'Fédération départementale pour la pêche et la protection du milieu aquatique' => 'fdapp',
                    'Fédération départementale des chasseurs' => 'fdc',
                    'Fongecif' => 'fongecif',
                    'Brigade de gendarmerie' => 'gendarmerie',
                    'Greta' => 'greta',
                    'Service de publicité foncière ex-conservation des hypothèques' => 'hypotheque',
                    'Direction des services départementaux de l\'Éducation nationale' => 'inspection_academique',
                    'Mission d’accueil et d’information des associations (MAIA)' => 'maia',
                    'Mairie' => 'mairie',
                    'Mairie des collectivités d\'outre-mer' => 'mairie_com',
                    'Mairie mobile de la ville de Paris' => 'mairie_mobile',
                    'Maison d\'arrêt' => 'maison_arret',
                    'Maison centrale' => 'maison_centrale',
                    'Maison départementale des personnes handicapées (MDPH)' => 'maison_handicapees',
                    'Maison départementale des solidarités' => 'mds',
                    'Mission locale et Permanence d’accueil, d’information et d’orientation (PAIO)' => 'mission_locale',
                    'Maison de justice et du droit' => 'mjd',
                    'Mutualité sociale agricole (MSA), réseau local' => 'msa',
                    'Office français de l\'immigration et de l\'intégration (ex ANAEM), réseau local' => 'ofii',
                    'Office national des anciens combattants (ONAC), réseau local' => 'onac',
                    'Direction régionale de l\'Office national des forêts' => 'onf',
                    'Mairie de Paris, Hôtel de Ville' => 'paris_mairie',
                    'Mairie de Paris, mairie d\'arrondissement' => 'paris_mairie_arrondissement',
                    'Préfecture de police de Paris' => 'paris_ppp',
                    'Préfecture de police de Paris, antenne d’arrondissement' => 'paris_ppp_antenne',
                    'Préfecture de police de Paris, certificat d\'immatriculation' => 'paris_ppp_certificat_immatriculation',
                    'Préfecture de police de Paris - Site central de Gesvres' => 'paris_ppp_gesvres',
                    'Préfecture de police de Paris, permis de conduire' => 'paris_ppp_permis_conduire',
                    'Permanence juridique' => 'permanence_juridique',
                    'Point info famille' => 'pif',
                    'Centre de protection maternelle et infantile (PMI)' => 'pmi',
                    'Pôle emploi' => 'pole_emploi',
                    'Préfecture de police des Bouches-du-Rhône' => 'pp_marseille',
                    'Préfecture' => 'prefecture',
                    'Greffe des associations' => 'prefecture_greffe_associations',
                    'Préfecture de région' => 'prefecture_region',
                    'Conseil de prud’hommes' => 'prudhommes',
                    'Rectorat' => 'rectorat',
                    'Service territorial de l’architecture et du patrimoine' => 'sdac',
                    'Services départementaux des solidarités et de l\'insertion' => 'sdsei',
                    'Service de la navigation' => 'service_navigation',
                    'Secrétariat pour l\'administration du ministère de l\'Intérieur (SGAMI)' => 'sgami',
                    'Service des impôts des entreprises du Centre des finances publiques' => 'sie',
                    'Service des impôts des particuliers du Centre des finances publiques' => 'sip',
                    'Sous-préfecture' => 'sous_pref',
                    'Service pénitentiaire d\'insertion et de probation' => 'spip',
                    'Service universitaire d\'information et d\'orientation' => 'suio',
                    'Tribunal administratif' => 'ta',
                    'Tribunal pour enfants' => 'te',
                    'Tribunal de grande instance' => 'tgi',
                    'Tribunal d’instance' => 'ti',
                    'Trésorerie' => 'tresorerie',
                    'Tribunal de commerce' => 'tribunal_commerce',
                    'Urssaf' => 'urssaf',
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
