def bubble_sort(arr):
    """
    冒泡排序算法
    时间复杂度: O(n²)
    空间复杂度: O(1)
    """
    n = len(arr)
    
    # 遍历所有数组元素
    for i in range(n):
        # 标记此轮是否发生交换
        swapped = False
        
        # 最后i个元素已经在正确位置
        for j in range(0, n - i - 1):
            # 如果当前元素大于下一个元素，则交换它们
            if arr[j] > arr[j + 1]:
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                swapped = True
        
        # 如果没有发生交换，说明数组已经排序完成
        if not swapped:
            break
    
    return arr


def bubble_sort_optimized(arr):
    """
    优化版冒泡排序
    记录最后一次交换的位置，减少不必要的比较
    """
    n = len(arr)
    last_swap = n - 1
    
    while last_swap > 0:
        current_swap = 0
        
        for j in range(last_swap):
            if arr[j] > arr[j + 1]:
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                current_swap = j
        
        last_swap = current_swap
    
    return arr


# 测试代码
if __name__ == "__main__":
    # 测试数据
    test_arrays = [
        [64, 34, 25, 12, 22, 11, 90],
        [5, 2, 4, 6, 1, 3],
        [1],
        [],
        [3, 3, 3, 3],
        [9, 8, 7, 6, 5, 4, 3, 2, 1]
    ]
    
    print("冒泡排序演示:")
    print("=" * 50)
    
    for i, arr in enumerate(test_arrays, 1):
        print(f"测试 {i}:")
        print(f"原始数组: {arr}")
        
        # 创建副本进行排序
        arr_copy = arr.copy()
        sorted_arr = bubble_sort(arr_copy)
        print(f"排序结果: {sorted_arr}")
        print()
    
    print("优化版冒泡排序演示:")
    print("=" * 50)
    
    for i, arr in enumerate(test_arrays, 1):
        print(f"测试 {i}:")
        print(f"原始数组: {arr}")
        
        # 创建副本进行排序
        arr_copy = arr.copy()
        sorted_arr = bubble_sort_optimized(arr_copy)
        print(f"排序结果: {sorted_arr}")
        print()