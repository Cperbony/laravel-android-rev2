<?php
/**
 * @OA\Get(
 * path="/api/categories",
 * summary="Get list of categories",
 *     operationId="listCategories",
 *     tags={"Category"},
 *     description="Returns list of categories",
 *     security={{"bearerAuth":{}}},
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *              @OA\MediaType(
 *                  mediaType="application/json",
 *              @OA\Schena(
 *                  @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer"),
 *                      @OA\Property(property="name", type="string"),
 *                      @OA\Property(property="created_at", type="string", format="date-time"),
 *                          @OA\Property(property="updated_at", type="string", format="date-time"),
 *                      )
 *                  )
 *              )
 *           )
 *        )
 *      )
 *
 */