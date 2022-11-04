<?php

namespace App\Form;
use App\Entity\User;
use App\Entity\SkillUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('id_user')
            ->add('save', SubmitType::class, ['label' => 'Create Skill'])
        ;
    }




    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SkillUser::class,
        ]);
    }
}
