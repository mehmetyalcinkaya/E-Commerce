<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use App\Repository\OrderDetailRepository;
use App\Repository\OrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index()
    {
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM messages Order by ID desc LIMIT 5;";
        $sql1="SELECT * FROM orders Order by ID desc LIMIT 5;";
        $sql2="SELECT * FROM product Order by ID desc LIMIT 5;";
        $statement=$em->getConnection()->prepare($sql);
        $statement1=$em->getConnection()->prepare($sql1);
        $statement2=$em->getConnection()->prepare($sql2);
        $statement->execute();
        $statement1->execute();
        $statement2->execute();
        $mesaj=$statement->fetchAll();
        $siparisler=$statement1->fetchAll();
        $urunler=$statement2->fetchAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'mesaj' => $mesaj,
            'siparisler' => $siparisler,
            'urunler' => $urunler,
        ]);
    }

    /**
     * @Route("/orders/{slug}", name="admin_orders_index")
     */
    public function orders($slug,OrdersRepository $ordersRepository)
    {
        $orders=$ordersRepository->findBy(['status'=>$slug]);
        return $this->render('admin/orders/index.html.twig', [
            'orders' => $orders,
        ]);
    }

    /**
     * @Route("/orders/show/{id}", name="admin_orders_show", methods="GET")
     */
    public function show($id,Orders $orders,OrderDetailRepository $orderDetailRepository): Response
    {
        $orderdetail=$orderDetailRepository->findBy(
            ['orderid'=>$id]
        );

        return $this->render('admin/orders/show.html.twig', [
            'orderdetail' => $orderdetail,
            'order' => $orders,
        ]);
    }

    /**
     * @Route("/order/{id}/update", name="admin_orders_update", methods="POST")
     */
    public function order_update($id,Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $sql = "UPDATE orders SET shipinfo=:shipinfo, note=:note, status=:status WHERE id=:id";
        $statement=$em->getConnection()->prepare($sql);
        $statement->bindValue('shipinfo',$request->request->get('shipinfo'));
        $statement->bindValue('note',$request->request->get('note'));
        $statement->bindValue('status',$request->request->get('status'));
        $statement->bindValue('id',$id);
        $statement->execute();
        $this->addFlash('success','Sipariş Bilgileri Güncellenmiştir');

        return $this->redirectToRoute('admin_orders_show',array('id' =>$id));
    }
}
