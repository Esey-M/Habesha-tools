<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTranslatorService extends App_KernelProdContainer
{
    /*
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['translator'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService', true],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService', true],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService', true],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService', true],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService', true],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService', true],
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService', true],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService', true],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService', true],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService', true],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService', true],
        ], [
            'translation.loader.php' => '?',
            'translation.loader.yml' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.po' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.csv' => '?',
            'translation.loader.res' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', ['translation.loader.php' => ['php'], 'translation.loader.yml' => ['yaml', 'yml'], 'translation.loader.xliff' => ['xlf', 'xliff'], 'translation.loader.po' => ['po'], 'translation.loader.mo' => ['mo'], 'translation.loader.qt' => ['ts'], 'translation.loader.csv' => ['csv'], 'translation.loader.res' => ['res'], 'translation.loader.dat' => ['dat'], 'translation.loader.ini' => ['ini'], 'translation.loader.json' => ['json']], ['cache_dir' => (\dirname(__DIR__, 5).'//Users/simonmhretab/Documents/Habesha-tools/habesha/var/cache/prod/translations'), 'debug' => false, 'resource_files' => ['af' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.af.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.af.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.af.xlf')], 'ar' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.ar.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.ar.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.ar.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.ar.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.ar.yaml')], 'az' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.az.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.az.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.az.xlf')], 'be' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.be.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.be.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.be.xlf')], 'bg' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.bg.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.bg.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.bg.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.bg.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.bg.yaml')], 'bs' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.bs.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.bs.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.bs.xlf')], 'ca' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.ca.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.ca.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.ca.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.ca.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.ca.yaml')], 'cs' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.cs.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.cs.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.cs.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.cs.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.cs.yaml')], 'cy' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.cy.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.cy.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.cy.xlf')], 'da' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.da.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.da.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.da.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.da.xliff')], 'de' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.de.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.de.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.de.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.de.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.de.yaml')], 'el' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.el.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.el.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.el.xlf')], 'en' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.en.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.en.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.en.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.en.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.en.yaml')], 'es' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.es.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.es.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.es.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.es.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.es.yaml')], 'et' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.et.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.et.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.et.xlf')], 'eu' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.eu.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.eu.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.eu.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.eu.xliff')], 'fa' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.fa.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.fa.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.fa.xlf')], 'fi' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.fi.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.fi.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.fi.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.fi.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.fi.yaml')], 'fr' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.fr.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.fr.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.fr.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.fr.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.fr.yaml')], 'gl' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.gl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.gl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.gl.xlf')], 'he' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.he.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.he.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.he.xlf')], 'hr' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.hr.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.hr.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.hr.xlf')], 'hu' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.hu.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.hu.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.hu.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.hu.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.hu.yaml')], 'hy' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.hy.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.hy.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.hy.xlf')], 'id' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.id.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.id.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.id.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.id.xliff')], 'it' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.it.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.it.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.it.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.it.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.it.yaml')], 'ja' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.ja.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.ja.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.ja.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.ja.xliff')], 'lb' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.lb.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.lb.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.lb.xlf')], 'lt' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.lt.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.lt.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.lt.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.lt.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.lt.yaml')], 'lv' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.lv.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.lv.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.lv.xlf')], 'mk' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.mk.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.mk.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.mk.xlf')], 'mn' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.mn.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.mn.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.mn.xlf')], 'my' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.my.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.my.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.my.xlf')], 'nb' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.nb.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.nb.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.nb.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.nb.xliff')], 'nl' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.nl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.nl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.nl.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.nl.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.nl.yaml')], 'nn' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.nn.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.nn.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.nn.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.nn.xliff')], 'no' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.no.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.no.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.no.xlf')], 'pl' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.pl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.pl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.pl.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.pl.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.pl.yaml')], 'pt' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.pt.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.pt.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.pt.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.pt.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.pt.yaml')], 'pt_BR' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.pt_BR.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.pt_BR.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.pt_BR.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.pt_BR.xliff')], 'ro' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.ro.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.ro.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.ro.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.ro.xliff')], 'ru' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.ru.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.ru.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.ru.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.ru.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.ru.yaml')], 'sk' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.sk.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.sk.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.sk.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.sk.xliff')], 'sl' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.sl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.sl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.sl.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.sl.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.sl.yaml')], 'sq' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.sq.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.sq.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.sq.xlf')], 'sr_Cyrl' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.sr_Cyrl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.sr_Cyrl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.sr_Cyrl.xlf')], 'sr_Latn' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.sr_Latn.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.sr_Latn.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.sr_Latn.xlf')], 'sv' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.sv.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.sv.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.sv.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.sv.xliff')], 'th' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.th.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.th.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.th.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.th.xliff')], 'tl' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.tl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.tl.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.tl.xlf')], 'tr' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.tr.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.tr.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.tr.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.tr.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.tr.yaml')], 'uk' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.uk.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.uk.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.uk.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.uk.xliff'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.uk.yaml')], 'ur' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.ur.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.ur.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.ur.xlf')], 'uz' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.uz.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.uz.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.uz.xlf')], 'vi' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.vi.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.vi.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.vi.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.vi.xliff')], 'zh_CN' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.zh_CN.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.zh_CN.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.zh_CN.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.zh_CN.xliff')], 'zh_TW' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations/validators.zh_TW.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations/validators.zh_TW.xlf'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations/security.zh_TW.xlf'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.zh_TW.xliff')], 'bs_Latn_BA' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.bs_Latn_BA.xliff')], 'eo' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.eo.xliff')], 'hr_HR' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.hr_HR.xliff')], 'ky' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.ky.xliff')], 'pt_PT' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.pt_PT.xliff')], 'sr_Latin' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.sr_Latin.xliff')], 'zh' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.zh.xliff')], 'zh_HK' => [(\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations/time.zh_HK.xliff')], 'vn' => [(\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations/messages.vn.yaml')]], 'scanned_directories' => [(\dirname(__DIR__, 5).'/vendor/symfony/validator/Resources/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/form/Resources/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/security-core/Resources/translations'), (\dirname(__DIR__, 5).'/vendor/knplabs/knp-time-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/vich/uploader-bundle/translations'), (\dirname(__DIR__, 5).'/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/framework-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/doctrine/doctrine-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/doctrine/doctrine-migrations-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/twig-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/ux-twig-component/translations'), (\dirname(__DIR__, 5).'/vendor/twig/extra-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/monolog-bundle/translations'), (\dirname(__DIR__, 5).'/vendor/symfony/security-bundle/translations')], 'cache_vary' => ['scanned_directories' => ['vendor/symfony/validator/Resources/translations', 'vendor/symfony/form/Resources/translations', 'vendor/symfony/security-core/Resources/translations', 'vendor/knplabs/knp-time-bundle/translations', 'vendor/vich/uploader-bundle/translations', 'translations', 'vendor/symfony/framework-bundle/translations', 'vendor/doctrine/doctrine-bundle/translations', 'vendor/doctrine/doctrine-migrations-bundle/translations', 'vendor/symfony/twig-bundle/translations', 'vendor/symfony/ux-twig-component/translations', 'vendor/twig/extra-bundle/translations', 'vendor/symfony/monolog-bundle/translations', 'vendor/symfony/security-bundle/translations']]], []);

        $instance->setConfigCacheFactory(($container->privates['config_cache_factory'] ??= new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory()));
        $instance->setFallbackLocales(['en']);

        return $instance;
    }
}
