<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_TranslationExtractService extends App_KernelProdContainer
{
    /*
     * Gets the private 'console.command.translation_extract' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\TranslationUpdateCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['console.command.translation_extract'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\TranslationUpdateCommand(($container->privates['translation.writer'] ?? $container->load('getTranslation_WriterService')), ($container->privates['translation.reader'] ?? $container->load('getTranslation_ReaderService')), ($container->privates['translation.extractor'] ?? $container->load('getTranslation_ExtractorService')), 'en', '/Users/simonmhretab/Documents/Habesha-tools/habesha/translations', '/Users/simonmhretab/Documents/Habesha-tools/habesha/templates', ['/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/validator/Resources/translations', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Resources/translations', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/security-core/Resources/translations', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/knplabs/knp-time-bundle/translations', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/vich/uploader-bundle/translations'], ['/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Resources/views/Email', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Resources/views/Form', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/http-kernel/EventListener/LocaleAwareListener.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/framework-bundle/Command/TranslationDebugCommand.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/framework-bundle/CacheWarmer/TranslationsCacheWarmer.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/translation/LocaleSwitcher.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Core/Type/ChoiceType.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Core/Type/FileType.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Core/Type/ColorType.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Core/Type/TransformationFailureExtension.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Validator/Type/FormTypeValidatorExtension.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Validator/Type/UploadValidatorExtension.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/form/Extension/Csrf/Type/FormTypeCsrfExtension.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/validator/ValidatorBuilder.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Extension/TranslationExtension.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Extension/FormExtension.php', '/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/knplabs/knp-time-bundle/src/DateTimeFormatter.php'], []);

        $instance->setName('translation:extract');
        $instance->setDescription('Extract missing translations keys from code to translation files');

        return $instance;
    }
}
