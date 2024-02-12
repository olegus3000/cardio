<?php

namespace App\Controller;

use App\Entity\Card;
use App\Entity\Settings;
use App\Form\ListType;
use App\Repository\CardRepository;
use Doctrine\ORM\QueryBuilder;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTable;
use Omines\DataTablesBundle\DataTableFactory;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ListController extends AbstractController
{

    private DataTableFactory $factory;

    public function __construct(DataTableFactory $factory) {
        $this->factory = $factory;
    }

    private function createDataTable(array $options = []): DataTable
    {
        return $this->factory->create($options);
    }

    #[Route('/list', name: 'app_list')]
    public function list(Request $request): Response
    {
        if (empty($this->getUser())) {
            return $this->redirectToRoute('app_login');
        }

        $table = $this->createDataTable()
            ->add('sideA', TextColumn::class, ['label' => 'Side A'])
            ->add('sideB', TextColumn::class, ['label' => 'Side B'])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Card::class,
                'query' => function (QueryBuilder $builder) {
                    $builder
                        ->select('c')
                        ->from(Card::class, 'c');
                },
            ])
            ->handleRequest($request);

        if ($table->isCallback()) {
            return $table->getResponse();
        }

        return $this->render('list/list.html.twig', [
            'datatable' => $table
        ]);

    }
}
