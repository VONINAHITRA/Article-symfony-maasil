<?php

namespace App\Form;

use App\Entity\ArticleEntity;
use App\Entity\AuteurEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreArticle')
            ->add('texteArticle')
            ->add('auteurArticle',EntityType::class,[
                   'class' => AuteurEntity::class,
                   'choice_label' => 'nomAuteur',   
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleEntity::class,
        ]);
    }
}
